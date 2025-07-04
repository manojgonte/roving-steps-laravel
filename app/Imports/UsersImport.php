<?php

namespace App\Imports;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Illuminate\Support\Facades\Validator;

use PhpOffice\PhpSpreadsheet\Shared\Date;

// class UsersImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithBatchInserts, WithChunkReading
class UsersImport implements ToCollection, WithValidation, SkipsOnFailure
{
    use SkipsFailures;

    public function collection(Collection $rows) {
        foreach($rows as $index => $row){
            if ($index === 0) {
                continue; // Skip header row
            }

            $validator = Validator::make($row->toArray(), [
                '0' => 'required|string|max:255',              
                '1' => 'nullable|numeric',                     
                '3' => 'nullable|email|unique:users,email',    
            ]);
            if ($validator->fails()) {
                \Log::warning('Row skipped due to validation error', [
                    'row' => $row->toArray(),
                    'errors' => $validator->errors()->all(),
                ]);
                continue;
            }

            if (User::where('name', $row[0])->exists()) {
                return null; // skip
            }

            $user = new User;
            $user->name             = $row[0];
            $user->contact          = $row[1] ?? null;
            $user->contact_alt      = $row[2] ?? null;
            $user->email            = $row[3] ?? null;
            $user->address          = $row[4] ?? null;
            $user->dob              = isset($row[5]) ? Carbon::instance(Date::excelToDateTimeObject(intval($row[5]))) : null;
            $user->anniversary_date = isset($row[6]) ? Carbon::instance(Date::excelToDateTimeObject(intval($row[6]))) : null;
            $user->passport_no      = $row[7] ?? null;
            $user->passport_expiry  = isset($row[8]) ? Carbon::instance(Date::excelToDateTimeObject(intval($row[8]))) : null;
            $user->visa_type        = $row[9] ?? null;
            $user->visa_expiry      = isset($row[10]) ? Carbon::instance(Date::excelToDateTimeObject(intval($row[10]))) : null;
            $user->pan_no           = $row[11] ?? null;
            $user->aadhar_no        = $row[12] ?? null;
            $user->gst_no           = $row[13] ?? null;
            $user->gst_address      = $row[14] ?? null;
            $user->created_at       = isset($row[15]) ? Carbon::instance(Date::excelToDateTimeObject(intval($row[15]))) : now();
            $user->password         = isset($row[0]) ? bcrypt(Str::slug($row[0]).'123') : bcrypt('default123');
            $user->save();
        }
    }

    public function rules(): array {
        return [];
    }

    public function batchSize(): int {
        return 100;
    }

    public function chunkSize(): int {
        return 100;
    }
}
