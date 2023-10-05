<?php 
namespace App\Http\Controllers; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Make sure this import is present

class ServicesController extends Controller
{

    
    public function index(Request $request)
    {
        $disk = Storage::disk('csv');

        $csvFilePath = base_path('storage/app/data/services.csv');
        if ($disk->exists('services.csv')) {
            $servicesArray = [];
            $services = fopen($csvFilePath, 'r');

            if ($services) {
                while (($line = fgetcsv($services)) !== FALSE) {
                    $servicesArray[] = $line;
                }

                fclose($services);
                return response()->json($servicesArray);
            } else {
                // Handle the case where fopen failed
                return response()->json(['error' => 'Failed to open the CSV file Lui'], 500);
            }
        } else {
            // Handle the case where the file doesn't exist
            return response()->json(['error' => 'CSV file not found Lui'], 404);
        }
    }
    
    public function getCountryByCode(Request $request, $countryCode)
    {
        $csvFilePath = base_path('storage/app/data/services.csv');
        $services = fopen($csvFilePath, 'r');
        $servicesArray = [];
        while (($line = fgetcsv($services)) !== FALSE) {
            if (strtoupper($line[3]) == strtoupper($countryCode)) {
                $servicesArray[] = $line;
            }
        }
        fclose($services);
        return response()->json($servicesArray);
    }

    public function addNewOrUpdate(Request $request)
    {
        $csvFilePath = base_path('storage/app/data/services.csv');
        $services = fopen($csvFilePath, 'a+');
         // Read existing services from the CSV file
         $existingServices = [];
         while (($row = fgetcsv($services)) !== false) {
             $existingServices[] = $row;
         }
         
         // Find the index of the service you want to update (if it exists)
         $indexToUpdate = -1;
         $newService = [
             $request->input('Ref'),
             $request->input('Centre'),
             $request->input('Service'),
             $request->input('Country')
         ];
     
         // Check if the service with the same 'Ref' already exists
         foreach ($existingServices as $index => $service) {
             if ($service[0] == $newService[0]) {
                 $indexToUpdate = $index;
                 break;
             }
         }
     
         if ($indexToUpdate !== -1) {
             // Update the existing service
             $existingServices[$indexToUpdate] = $newService;
         } else {
             // Add the new service to the array
             $existingServices[] = $newService;
         }
     
         // Rewind the file pointer and truncate the file
         ftruncate($services, 0);
         rewind($services);
         
         // Write the updated or new services back to the CSV file
         foreach ($existingServices as $service) {
             fputcsv($services, $service);
         }
         
         fclose($services);
     
         return response()->json(['message' => 'Service updated or created']);
    }
   
}

