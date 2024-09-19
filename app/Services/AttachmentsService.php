<?php

namespace App\Services;
use Exception;
use Log;
use App\Models\Attachments;
use App\Helpers\FileHelper;
use App\Traits\ActivityLog;
use App\Traits\Common;
use Auth;

class AttachmentsService
{
  use ActivityLog,Common;


   public function uploadImagesandAttachment($request,$entity,$folder)
   {
        $attachment='';
        $folder='attachments/'.$folder;
        if(isset($request->image))
        {
            $file = $request->image;
            if($file!=null)
            {
                // dd($file);
                // if ($request->file('image')->isValid())
                // {
                    // dd($file);
                  $path = FileHelper::uploadFile(env('FILESYSTEM_DISK'),$folder, $file);
                //   dd($file);
                  $extension = $file->extension();

                   $attachment=Attachments::createAttachment($file->getClientOriginalName(),$extension,$path,$entity);
                   
                // }
            }
        }

        $ip = $this->getRequestIP();
              $this->doActivityLog(
              $attachment,
              Auth::user(),
              ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
              'add_attachment',
              'Attachment Uploaded Successfully'
                );

        return $attachment;

    }
}
