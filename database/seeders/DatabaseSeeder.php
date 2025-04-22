<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Airport;
use App\Models\Airline;
use App\Models\Flight;
use App\Models\FlightSegment;
use App\Models\FlightClass;
use App\Models\FlightSeat;
use App\Models\Facility;
use App\Models\PromoCode;
use App\Models\Transaction;
use App\Models\TransactionPassenger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // // Nonaktifkan foreign key check sementara
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // // Kosongkan semua tabel
        // TransactionPassenger::truncate();
        // Transaction::truncate();
        // PromoCode::truncate();
        // Facility::truncate();
        // FlightSeat::truncate();
        // FlightClass::truncate();
        // FlightSegment::truncate();
        // Flight::truncate();
        // Airline::truncate();
        // Airport::truncate();
        
        // // Aktifkan kembali foreign key check
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

          // Seed data User
    User::factory()->create([
        'name' => 'itzluthfi',
        'email' => 'itzluthfi@garuda.com',
        'password' => Hash::make('password'),
    ]);

    // Buat beberapa user random
    User::factory(3)->create();

        // Seed data Airport
        Airport::insert([
            [
                'iata_code' => 'CGK',
                'name' => 'Soekarno-Hatta International Airport',
                'image' => 'airports/cgk.jpg',
                'city' => 'Tangerang',
                'province' => 'Banten',
                'country' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'iata_code' => 'DPS',
                'name' => 'Ngurah Rai International Airport',
                'image' => 'airports/dps.jpg',
                'city' => 'Denpasar',
                'province' => 'Bali',
                'country' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'iata_code' => 'SUB',
                'name' => 'Juanda International Airport',
                'image' => 'airports/sub.jpg',
                'city' => 'Surabaya',
                'province' => 'East Java',
                'country' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Seed data Airline
        Airline::insert([
            [
                'code' => 'GA',
                'name' => 'Garuda Indonesia',
                'logo' => 'airlines/ga.png',
                'country' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'QG',
                'name' => 'Citilink',
                'logo' => 'airlines/qg.png',
                'country' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code' => 'SQ',
                'name' => 'Singapore Airlines',
                'logo' => 'airlines/sq.png',
                'country' => 'Singapore',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Seed data Flight
        Flight::insert([
            [
                'flight_number' => 'GA123',
                'airline_id' => 1, // Garuda Indonesia
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'flight_number' => 'QG456',
                'airline_id' => 2, // Citilink
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'flight_number' => 'SQ789',
                'airline_id' => 3, // Singapore Airlines
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Seed data FlightSegment
        FlightSegment::insert([
            // Flight GA123 (CGK -> DPS)
            [
                'sequence' => 1,
                'flight_id' => 1,
                'airport_id' => 1, // CGK
                'time' => '2023-12-01 08:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sequence' => 2,
                'flight_id' => 1,
                'airport_id' => 2, // DPS
                'time' => '2023-12-01 11:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Flight QG456 (DPS -> SUB)
            [
                'sequence' => 1,
                'flight_id' => 2,
                'airport_id' => 2, // DPS
                'time' => '2023-12-02 14:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sequence' => 2,
                'flight_id' => 2,
                'airport_id' => 3, // SUB
                'time' => '2023-12-02 15:30:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Flight SQ789 (CGK -> SUB)
            [
                'sequence' => 1,
                'flight_id' => 3,
                'airport_id' => 1, // CGK
                'time' => '2023-12-03 10:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'sequence' => 2,
                'flight_id' => 3,
                'airport_id' => 3, // SUB
                'time' => '2023-12-03 11:30:00',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Seed data FlightClass
        FlightClass::insert([
            // Flight GA123
            [
                'flight_id' => 1,
                'type_class' => 'economy',
                'price' => 1500000,
                'total_seats' => 150,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'flight_id' => 1,
                'type_class' => 'business',
                'price' => 3000000,
                'total_seats' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Flight QG456
            [
                'flight_id' => 2,
                'type_class' => 'economy',
                'price' => 1200000,
                'total_seats' => 180,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Flight SQ789
            [
                'flight_id' => 3,
                'type_class' => 'economy',
                'price' => 2000000,
                'total_seats' => 200,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'flight_id' => 3,
                'type_class' => 'business',
                'price' => 4500000,
                'total_seats' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Seed data Facility
        Facility::insert([
            [
                'image' => 'facilities/baggage.jpg',
                'name' => 'Baggage 20kg',
                'description' => 'Free checked baggage allowance up to 20kg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => 'facilities/meal.jpg',
                'name' => 'Meal Service',
                'description' => 'In-flight meal service included',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => 'facilities/lounge.jpg',
                'name' => 'Lounge Access',
                'description' => 'Access to airport lounge before flight',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'image' => 'facilities/priority.jpg',
                'name' => 'Priority Boarding',
                'description' => 'Priority boarding service',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Seed data FlightClassFacility (pivot table) - menggunakan DB::table()
    DB::table('flight_class_facility')->insert([
        // Economy Class GA123
        [
            'flight_class_id' => 1,
            'facility_id' => 1, // Baggage 20kg
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'flight_class_id' => 1,
            'facility_id' => 2, // Meal Service
            'created_at' => now(),
            'updated_at' => now()
        ],
        // Business Class GA123
        [
            'flight_class_id' => 2,
            'facility_id' => 1, // Baggage 20kg
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'flight_class_id' => 2,
            'facility_id' => 2, // Meal Service
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'flight_class_id' => 2,
            'facility_id' => 3, // Lounge Access
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'flight_class_id' => 2,
            'facility_id' => 4, // Priority Boarding
            'created_at' => now(),
            'updated_at' => now()
        ]
    ]);

        // Seed data FlightSeat
        FlightSeat::insert([
            // Economy seats for GA123 (rows 1-10)
            [
                'flight_id' => 1,
                'row' => 1,
                'column' => 1,
                'class_type' => 'economy',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'flight_id' => 1,
                'row' => 1,
                'column' => 2,
                'class_type' => 'economy',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Business seats for GA123 (rows 11-12)
            [
                'flight_id' => 1,
                'row' => 11,
                'column' => 1,
                'class_type' => 'business',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'flight_id' => 1,
                'row' => 11,
                'column' => 2,
                'class_type' => 'business',
                'is_available' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Economy seats for QG456
            [
                'flight_id' => 2,
                'row' => 1,
                'column' => 1,
                'class_type' => 'economy',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'flight_id' => 2,
                'row' => 1,
                'column' => 2,
                'class_type' => 'economy',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Seed data PromoCode
        PromoCode::insert([
            [
                'id' => 1, // Tambahkan ID secara eksplisit
                'code' => 'DISKON10',
                'discount_type' => 'percentage',
                'discount' => 10,
                'valid_until' => '2023-12-31 23:59:59',
                'is_used' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2, // Tambahkan ID secara eksplisit
                'code' => 'CASHBACK50',
                'discount_type' => 'amount',
                'discount' => 500000,
                'valid_until' => '2023-12-15 23:59:59',
                'is_used' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3, // Tambahkan ID secara eksplisit
                'code' => 'NEWYEAR20',
                'discount_type' => 'percentage',
                'discount' => 20,
                'valid_until' => '2024-01-15 23:59:59',
                'is_used' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        
        // Seed data Transaction
        Transaction::insert([
            [
                'id' => 1, // Tambahkan ID secara eksplisit
                'code' => 'TRX-001',
                'flight_id' => 1,
                'flight_class_id' => 1, // Pastikan ID ini ada di flight_classes
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '081234567890',
                'number_of_passengers' => 2,
                'promo_code_id' => 1, // Pastikan ID ini ada di promo_codes
                'payment_status' => 'success',
                'subtotal' => 3000000,
                'grandtotal' => 2700000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2, // Tambahkan ID secara eksplisit
                'code' => 'TRX-002',
                'flight_id' => 3,
                'flight_class_id' => 5, // Pastikan ID ini ada di flight_classes
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '082345678901',
                'number_of_passengers' => 1,
                'promo_code_id' => null, // Bisa null
                'payment_status' => 'pending',
                'subtotal' => 4500000,
                'grandtotal' => 4500000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3, // Tambahkan ID secara eksplisit
                'code' => 'TRX-003',
                'flight_id' => 2,
                'flight_class_id' => 3, // Pastikan ID ini ada di flight_classes
                'name' => 'Bob Johnson',
                'email' => 'bob@example.com',
                'phone' => '083456789012',
                'number_of_passengers' => 3,
                'promo_code_id' => 2, // Pastikan ID ini ada di promo_codes
                'payment_status' => 'failed',
                'subtotal' => 3600000,
                'grandtotal' => 3450000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        // Seed data TransactionPassenger
        TransactionPassenger::insert([
            // Passengers for TRX-001
            [
                'transaction_id' => 1, // Pastikan ID ini ada di transactions
                'flight_seat_id' => 1, // Pastikan ID ini ada di flight_seats
                'name' => 'John Doe',
                'date_of_birth' => '1980-05-15',
                'nationality' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'transaction_id' => 1, // Pastikan ID ini ada di transactions
                'flight_seat_id' => 2, // Pastikan ID ini ada di flight_seats
                'name' => 'Mary Doe',
                'date_of_birth' => '1982-08-20',
                'nationality' => 'Indonesia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Passenger for TRX-002
            [
                'transaction_id' => 2, // Pastikan ID ini ada di transactions
                'flight_seat_id' => 6, // Pastikan ID ini ada di flight_seats
                'name' => 'Jane Smith',
                'date_of_birth' => '1990-11-25',
                'nationality' => 'USA',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}