<?php

namespace App\Controllers;

class Profileimage extends BaseController
{
    public function edit()
    {
        return view('Profileimage/edit');
    }

    public function update()
    {
        $file= $this->request->getFile('image');

        if(! $file->isValid()) {

            $error_code = $file->getError();

            if($error_code == UPLOAD_ERR_NO_FILE) {

                return redirect()->back()
                                 ->with('warning', 'No File Selected');
            }

            throw new \RuntimeException($file->getErrorString(). "" . $error_code);
        }

        $size = $file->getSizeByUnit('mb');

        if ($size > 2) {
            return redirect()->back()
                             ->with('warning', 'File too large (max 2MB)');
        }

        $type = $file->getMimeType();

        if(! in_array($type, ['image/png', 'image/jpeg'])) {

            return redirect()->back()
                             ->with('warning', 'Invalid File Format (PNG or JPEG only)');
        }

        $path = $file->store('profile_images');

        $path = WRITEPATH . 'uploads/' . $path;

        service('image')
            ->withFile($path)
            ->fit(200, 200, 'center')
            ->save($path);

        $user = service('auth')->getCurrentUser();

        $user->profile_image = $file->getName();

        $model = new \App\Models\UserModel;

        $model->protect(false)->save($user);

        return redirect()->to("/profile/show")
                         ->with('info', 'Image Uploaded Successfully');
    }

    public function delete()
    {
        if($this->request->getMethod() === 'post') {
            $user = service('auth')->getCurrentUser();

            $path = WRITEPATH . 'uploads/profile_images/' . $user->profile_image;

            if(is_file($path)) {
                unlink($path);
            }

            $user->profile_image = null;

            $model = new \App\Models\UserModel;

            $model->protect(false)->save($user);

            return redirect()->to("/profile/show")
                             ->with('info', 'Image Successfully deleted.');
        }

        return view('Profileimage/delete');
    }
}