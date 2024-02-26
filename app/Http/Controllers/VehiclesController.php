<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VehiclesController extends Controller
{
    public function index()
    {
        $accnt_id = 22; // Set the accnt_id to 12
        $mergedData = [];
        if ($accnt_id != 22) {
            $vehicles = DB::table('tbl_cvehicles')
                ->where('accnt_id', $accnt_id)
                ->paginate(10); // Baguhin ang '20' ayon sa iyong preferred na bilang ng items bawat page
            if (count((array) $vehicles) > 0) {
                foreach ($vehicles as $vehicle) {
                    $imei = $vehicle->imei;

                    $imageSrc = '';

                    // Define the image path using double quotes and concatenation
                    $imagePath = 'images/vid_' . $vehicle->vid . '.*';

                    // Use glob to find matching files
                    $matchingFiles = glob($imagePath);

                    if (!empty($matchingFiles)) {
                        $imageSrc = $matchingFiles[0];
                    } else {
                        $imageSrc = 'images/img.png';
                    }

                    // Add the $imageSrc property to the $vehicle object
                    $vehicle->imagesrc = $imageSrc;

                    $imeiTable = DB::table($imei)
                        ->orderBy('gps_date', 'desc')
                        ->limit(1)
                        ->get()
                        ->first();
                    if (count((array) $imeiTable) > 0) {
                        $mergedData[] = (object) array_merge((array) $vehicle, (array) $imeiTable);
                    }
                }
            }

            return view('vehicles.index', ['vehicles' => $mergedData, 'accnt_id' => $accnt_id]);

            // return response()->json(['vehicles' => $mergedData]);
        } else {
            $vehicles = DB::table('tbl_cvehicles')
                ->where('accnt_id', $accnt_id)
                ->get();

            if (count((array) $vehicles) > 0) {
                foreach ($vehicles as $vehicle) {
                    $veid = $vehicle->vid;
                    $imei = $vehicle->imei;
                    $positionid = $vehicle->lastpost;
                    $vplatenum = $vehicle->vplatenum;
                    $fuel_feature = $vehicle->fuel_feature;

                    $imageSrc = '';

                    // Define the image path using double quotes and concatenation
                    $imagePath = 'images/vid_' . $vehicle->vid . '.*';

                    // Use glob to find matching files
                    $matchingFiles = glob($imagePath);

                    if (!empty($matchingFiles)) {
                        $imageSrc = $matchingFiles[0];
                    } else {
                        $imageSrc = 'images/img.png';
                    }

                    // Add the $imageSrc property to the $vehicle object
                    $vehicle->imagesrc = $imageSrc;

                    $sqlLastrip = DB::table('tbl_allreports')
                        ->select('log_id', 'lat', 'lng', 'address', 'status', 'direction', 'kmperh', 'gps_date', 'lastpost')
                        ->where('lastpost', $positionid)
                        ->get()
                        ->first();

                    if (count((array) $sqlLastrip) > 0) {
                        $mergedData[] = (object) array_merge((array) $vehicle, (array) $sqlLastrip);
                    }
                }
            }

            return view('vehicles.index', ['vehicles' => $mergedData, 'accnt_id' => $accnt_id]);
        }
    }

    public function getData()
    {
        $accnt_id = 22; // Set the accnt_id to 12
        $mergedData = [];
        if ($accnt_id != 22) {
            $vehicles = DB::table('tbl_cvehicles')
            ->where('accnt_id', $accnt_id)
            ->paginate(10);

            if (count((array) $vehicles) > 0) {
                foreach ($vehicles as $vehicle) {
                    $imei = $vehicle->imei;

                    $imageSrc = '';

                    // Define the image path using double quotes and concatenation
                    $imagePath = 'images/vid_' . $vehicle->vid . '.*';

                    // Use glob to find matching files
                    $matchingFiles = glob($imagePath);

                    if (!empty($matchingFiles)) {
                        $imageSrc = $matchingFiles[0];
                    } else {
                        $imageSrc = 'images/img.png';
                    }

                    // Add the $imageSrc property to the $vehicle object
                    $vehicle->imagesrc = $imageSrc;

                    $imeiTable = DB::table($imei)
                        ->orderBy('gps_date', 'desc')
                        ->limit(1)
                        ->get()
                        ->first();
                    if (count((array) $imeiTable) > 0) {
                        $mergedData[] = (object) array_merge((array) $vehicle, (array) $imeiTable);
                    }
                }
            }
            return response()->json($mergedData);
        }
    }

    public function getDataInterval()
    {
        $accnt_id = 22; // Set the accnt_id to 12
        $mergedData = [];
        if ($accnt_id != 22) {
            $vehicles = DB::table('tbl_cvehicles')
                ->where('accnt_id', $accnt_id)
                ->get();

            if (count((array) $vehicles) > 0) {
                foreach ($vehicles as $vehicle) {
                    $imei = $vehicle->imei;

                    $imageSrc = '';

                    // Define the image path using double quotes and concatenation
                    $imagePath = 'images/vid_' . $vehicle->vid . '.*';

                    // Use glob to find matching files
                    $matchingFiles = glob($imagePath);

                    if (!empty($matchingFiles)) {
                        $imageSrc = $matchingFiles[0];
                    } else {
                        $imageSrc = 'images/img.png';
                    }

                    // Add the $imageSrc property to the $vehicle object
                    $vehicle->imagesrc = $imageSrc;

                    $imeiTable = DB::table($imei)
                        ->orderBy('gps_date', 'desc')
                        ->limit(1)
                        ->get()
                        ->first();
                    if (count((array) $imeiTable) > 0) {
                        $mergedData[] = (object) array_merge((array) $vehicle, (array) $imeiTable);
                    }
                }
            }
        } else {
            $vehicles = DB::table('tbl_cvehicles')
                ->where('accnt_id', $accnt_id)
                ->get();

            if (count((array) $vehicles) > 0) {
                foreach ($vehicles as $vehicle) {
                    $veid = $vehicle->vid;
                    $imei = $vehicle->imei;
                    $positionid = $vehicle->lastpost;
                    $vplatenum = $vehicle->vplatenum;
                    $fuel_feature = $vehicle->fuel_feature;

                    $imageSrc = '';

                    // Define the image path using double quotes and concatenation
                    $imagePath = 'images/vid_' . $vehicle->vid . '.*';

                    // Use glob to find matching files
                    $matchingFiles = glob($imagePath);

                    if (!empty($matchingFiles)) {
                        $imageSrc = $matchingFiles[0];
                    } else {
                        $imageSrc = 'images/img.png';
                    }

                    // Add the $imageSrc property to the $vehicle object
                    $vehicle->imagesrc = $imageSrc;

                    $sqlLastrip = DB::table('tbl_allreports')
                        ->select('log_id', 'lat', 'lng', 'address', 'status', 'direction', 'kmperh', 'gps_date', 'lastpost')
                        ->where('lastpost', $positionid)
                        ->get()
                        ->first();

                    if (count((array) $sqlLastrip) > 0) {
                        $mergedData[] = (object) array_merge((array) $vehicle, (array) $sqlLastrip);
                    }
                }
            }
        }

        return response()->json($mergedData);
    }

    public function getGeofenceData()
    {
        $accnt_id = 22;
        $geofences = DB::table('tbl_allgeofence')->select('*')
            ->where('accnt_id', $accnt_id)
            ->get();

        if (count((array) $geofences) > 0) {
            $geofenceData = array();

            foreach ($geofences as $geofence) {
                $geofenceData[] = $geofence;
            }
            return response()->json($geofenceData);
        } else {
            return null;
        }
    }


    public function getImeiData($imei, $startDate, $endDate) //$imei, $startDate, $endDate
    {
        // $imei = 'v863753040614703';
        // $startDate = '2023-09-16 19:58:50';
        // $endDate = '2023-09-16 23:25:45';
        // $imei = 'v359960107435440';
        // $startDate = '2024-01-31 07:14:19';
        // $endDate = '2024-01-31 15:10:53';
        // $startDate = '2024-01-31 00:00:00';
        // $endDate = '2024-01-31 23:59:59';


        // Define the column name you want to check
        $columnToCheck = 'remaining_fuel_litters';

        // Check if the column exists in the table
        $columnExists = Schema::hasColumn($imei, $columnToCheck);

        if ($columnExists) {
            $imeiData = DB::select("
                SELECT remaining_fuel_litters, status, gps_date, HOUR(gps_date) as hour, MINUTE(gps_date) as minute, DATE(gps_date) as dates, km_run, address, lat, lng, driver_id, direction
                FROM $imei
                WHERE gps_date BETWEEN ? AND ?
                ORDER BY gps_date ASC
            ", [$startDate, $endDate]);
        } else {
            $imeiData = DB::select("
                SELECT status, gps_date, HOUR(gps_date) as hour, MINUTE(gps_date) as minute, DATE(gps_date) as dates, km_run, address, lat, lng, driver_id, direction
                FROM $imei
                WHERE gps_date BETWEEN ? AND ?
                ORDER BY gps_date ASC
            ", [$startDate, $endDate]);
        }

        // foreach ($imeiData as $row) {
        //     $row->address = preg_replace('/[^A-Za-z0-9,\s]/', '', $row->address);
        // }

        return $imeiData;
    }

    public function showRoute($imei, $startDate, $endDate)
    {
        $data = $this->getImeiData($imei, $startDate, $endDate);


        if ($data != null) {
     
            $consecutiveIdleCount = 0; // Variable to track consecutive idle statuses
        
            $data1 = array();
            $poly = array();
            $marker_color = array();
            $idleData = array(); // Array to store idle data
            $startTime = null;
            $count = 1;
            $i = 0;
            foreach ($data as $row) {
                $address = $row->address;
                $lat = $row->lat;
                $lng = $row->lng;
                $status = $row->status;
                $gpsdates1 = $row->gps_date;
                $gsm = $row->driver_id;
                $direction = $row->direction;
            
                if ($status == "stop") {
                    $mcolor = "images/red_icon/number_";
                } elseif ($status == "idle") {
                    $mcolor = "images/yellow_icon/number_";
                } else {
                    $mcolor = "images/green_icon/number_";
                }

                $data1[] = array($address, $lat, $lng, $status, $gpsdates1, $gsm, $direction);
                $poly[] = (object) array('lat' => $lat, 'lng' => $lng);
                $marker_color[] = $mcolor;

        
                $count = $i + 1;
                $marker_color[$i] .= ($count > 999 ? '999' : $count) . '.png';
                $i++;
                // if ($status == 'idle') {
            
                //     $consecutiveIdleCount++; // Increase the count of consecutive idle statuses
            
                //     if ($startTime === null) {
                //         // Start of an idle period
                //         $startTime = strtotime($gpsdates1);
                //     }
            
                //     // Calculate idle duration for the current idle period
                //     $endTime = strtotime($gpsdates1);
                //     $duration = $endTime - $startTime;
            
                //     // Save the data for idle periods that are 10 or more consecutive idle statuses
                //     if ($consecutiveIdleCount >= 10) {
                //         $data1[] = array($address, $lat, $lng, 'idle', $gpsdates1, $gsm, $direction, $duration);
                //         $poly[] = (object) array('lat' => $lat, 'lng' => $lng);
                //         $marker_color[] = $mcolor;
            
                //         // Reset variables for the next idle period
                //         $startTime = null;
                //         $consecutiveIdleCount = 0;
                //     } else {
                //         // Store idle data in the array
                //         $idleData = array($address, $lat, $lng, $status, $gpsdates1, $gsm, $direction, $mcolor, $duration);
                //     }
            
                // } else {
                //     if ($startTime !== null) {
                //         // End of an idle period
                //         $startTime = null;
                //     }
            
                //     // Add stored idle data to arrays
                //     if (!empty($idleData)) {
                //         $data1[] = $idleData;
                //         $poly[] = (object) array('lat' => $idleData[1], 'lng' => $idleData[2]);
                //         $marker_color[] = $idleData[6];
                //         $idleData = array(); // Reset idle data array
                //     }
            
                //     // Driving
                //     $data1[] = array($address, $lat, $lng, $status, $gpsdates1, $gsm, $direction);
                //     $poly[] = (object) array('lat' => $lat, 'lng' => $lng);
                //     $marker_color[] = $mcolor;
                // }
            }
        
            // Remaining idle
            // if ($consecutiveIdleCount < 10 && $startTime !== null) {
            //     // Add stored idle data to arrays
            //     if (!empty($idleData)) {
            //         $data1[] = $idleData;
            //         $poly[] = (object) array('lat' => $idleData[1], 'lng' => $idleData[2]);
            //         $marker_color[] = $idleData[6];
            //         $idleData = array(); // Reset idle data array
            //     }
    
            // }

            
            // $count = 1; // Initialize the count variable
        
            // for ($i = 0; $i < count($marker_color); $i++) {
            //     $count = $i + 1;
            //     $marker_color[$i] .= ($count > 999 ? '999' : $count) . '.png';
            // }
        
            return array($data1, $poly, $marker_color);
        } else {
            return array(null, null, null);
        }

    }


    // public function showRoute($imei, $startDate, $endDate)
    // {
    //     $imeiData = $this->getImeiData($imei, $startDate, $endDate);
    // }

    public function test() {
        $imei = 'v359960107435440';
        $startDate = '2024-01-31 00:00:00';
        $endDate = '2024-01-31 23:59:59';

        $routeData = $this->showRoute($imei,  $startDate, $endDate);

        return view('vehicles.test', compact('routeData'));


    }


}
