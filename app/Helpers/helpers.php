<?php

function storeImage($document, $request){
  #Laravel automatically creates a hashed filename thats unique
  foreach ($request->file() as $key => $value) {
    if ($value) {
      if ($document->value != '') {
        Storage::delete($document->key);
      }
      $filename = $request->file($key)->store('public/' . Auth::user()->id . "/images/items/$document->id");
      $document->{$key} = "/storage/" . str_replace("public/", "", $filename);
    }
  }

  return $document;

}

?>