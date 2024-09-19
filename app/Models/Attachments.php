<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\FileHelper;
class Attachments extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='attachments';
    protected $fillable=['file_name','file_type','file_path','entity_id','entity_name'];
    public static function createAttachment($file_name,$file_type,$file_path,$entity){
        {
          
                $create=[
                    'entity_id' =>$entity->id,
                    'entity_name' =>get_class($entity),
                    'file_name'=>$file_name,
                    'file_type'=>$file_type,
                    'file_path'=>$file_path,
                ];
                $attachment=Attachments::create($create);
                return $attachment;
            }
              
        }
          public function getPath($file){
        if($file!=null)
            return FileHelper::getFilePath(NULL,$file);
        else
            return NULL;

    }
}
