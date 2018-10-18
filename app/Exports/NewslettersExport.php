<?php

namespace App\Exports;

use App\Models\Newsletter;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewslettersExport implements FromCollection {

  public function collection() {
    return Newsletter::all();
  }
}
