<?php 
namespace App\Http\Controllers\Voyager;

use App\Service;
use Carbon\Carbon;
use App\Reservation;
use League\Flysystem\Util;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Constraint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Http\Controllers\Controller;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class VoyagerController extends Controller
{
    public function index(Request $request)
    {
        $count = array("daily" => 0, "weekly" => 0, "monthly" => 0);
        $count['daily'] = Reservation::where('created_at','>=',Carbon::today())->count();
        $count['weekly'] = Reservation::where('created_at','>=',Carbon::today()->subDays(7))->orderByDesc('created_at')->limit(5)->get();
        $count['monthly'] = Reservation::where('created_at','>=',Carbon::today()->subDays(30))->count();
        $reservation = Reservation::where('status', 1)->get(['id','name','date','start_time','end_time','customer_name','customer_lname','location','status','price']);

        $price = Reservation::where('status',1)->select(DB::raw('sum(price) as sums'), 
            DB::raw("DATE_FORMAT(date,'%M %Y') as months"),
            DB::raw("DATE_FORMAT(date,'%m') as monthKey"))->groupBy('months', 'monthKey')
            ->orderBy('created_at', 'ASC')
            ->get();
        
        $data = [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($price as $order){
            $data[$order->monthKey-1] = $order->sums;
        }

        $notconfirm = Reservation::where('status',0)->count();
        $reserved = Reservation::where('status',1)->count();
        $completed = Reservation::where('status',1)->where('date', '<', Carbon::today())->count();

        $reservation_status = [$notconfirm,$reserved,$completed];


        return Voyager::view('voyager::index')->with([
            'count' => $count['weekly'], 
            'reservation' => $reservation, 
            'data' => $data,
            'reservation_status' => $reservation_status,
            ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('voyager.login');
    }

     public function upload(Request $request)
    {
        $fullFilename = null;
        $resizeWidth = 1800;
        $resizeHeight = null;
        $slug = $request->input('type_slug');
        $file = $request->file('image');

        $path = $slug.'/'.date('F').date('Y').'/';

        $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
        $filename_counter = 1;

        // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
        while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
            $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).(string) ($filename_counter++);
        }

        $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

        $ext = $file->guessClientExtension();

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {
            $image = Image::make($file)
                ->resize($resizeWidth, $resizeHeight, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            if ($ext !== 'gif') {
                $image->orientate();
            }
            $image->encode($file->getClientOriginalExtension(), 75);

            // move uploaded file from temp to uploads directory
            if (Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public')) {
                $status = __('voyager::media.success_uploading');
                $fullFilename = $fullPath;
            } else {
                $status = __('voyager::media.error_uploading');
            }
        } else {
            $status = __('voyager::media.uploading_wrong_type');
        }

        // echo out script that TinyMCE can handle and update the image in the editor
        return "<script> parent.helpers.setImageValue('".Voyager::image($fullFilename)."'); </script>";
    }

    public function assets(Request $request)
    {
        try {
            $path = dirname(__DIR__, 3).'/publishable/assets/'.Util::normalizeRelativePath(urldecode($request->path));
        } catch (\LogicException $e) {
            abort(404);
        }

        if (File::exists($path)) {
            $mime = '';
            if (Str::endsWith($path, '.js')) {
                $mime = 'text/javascript';
            } elseif (Str::endsWith($path, '.css')) {
                $mime = 'text/css';
            } else {
                $mime = File::mimeType($path);
            }
            $response = response(File::get($path), 200, ['Content-Type' => $mime]);
            $response->setSharedMaxAge(31536000);
            $response->setMaxAge(31536000);
            $response->setExpires(new \DateTime('+1 year'));

            return $response;
        }

        return response('', 404);
    }
}
