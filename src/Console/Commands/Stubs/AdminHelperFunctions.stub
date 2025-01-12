<?php
	use Illuminate\Support\Facades\File;

	define('PAGINATION_COUNT', 10);
	define('PAGINATION_COUNT_FRONT', 10);

	function uploadIamge($file, $folder){
		$destinationPath = 'admin/assets/images/' . $folder . '/'; // upload path
		$extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = time() . rand(11111, 99999) . '.' . $extension;  
		$file_move = $file->move(public_path($destinationPath), $fileName);
		return $destinationPath . $fileName;
	}

	function uploadIamges($files, $folder){
		$images = [];
		foreach ($files as $file){
			$destinationPath = 'admin/assets/images/' . $folder . '/'; // upload path
			$extension = $file->getClientOriginalExtension(); // getting image extension
			$fileName = time() . rand(11111, 99999) . '.' . $extension;  
			$file_move = $file->move(public_path($destinationPath), $fileName);
			$images[] = $destinationPath . $fileName;
		}
		$files = implode(",", $images);
		return $files;
	}

	function responseJson($status, $msg, $data = null)
	{
		$response = [
			'status' => $status,
			'msg' => $msg,
			'data' => $data
		];
		return response()->json($response);
	}


    // "autoload": {
    //     "psr-4": {
    //         "App\\": "app/",
    //         "Database\\Factories\\": "database/factories/",
    //         "Database\\Seeders\\": "database/seeders/"
    //     },
    //     "files" : [
    //         "app/helper/functions.php"
    //     ]
    // },