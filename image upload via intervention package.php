//Photo Upload Code
        if ($request->hasFile('product_image')) {
            $main_photo = $request->product_image;
            $Extension = $main_photo->getClientOriginalExtension();
            $photo_name = $insert_id.".". $Extension;
            image::make($main_photo)->resize(400, 450)->save(base_path('public/uploads/product_images/'. $photo_name));
            product::find($insert_id)->update([
                'product_image' => $photo_name
            ]);
        }
        return back();

        //update Photo Code
        if ($request->hasFile('product_image')) {
            if (product::find($product_id)->product_image != 'default_photo.jpg') {
                $delete_photo_name = product::find($product_id)->product_image;
                unlink(base_path('public/uploads/product_images/' . $delete_photo_name));
            }
            $main_photo = $request->product_image;
            $Extension = $main_photo->getClientOriginalExtension();
            $photo_name = $product_id . "." . $Extension;
            image::make($main_photo)->resize(400, 450)->save(base_path('public/uploads/product_images/' . $photo_name));
            product::find($product_id)->update([
                'product_image' => $photo_name
            ]);
        }
        return back()->with('edit', 'Your Product Edit Successfully!');
    }