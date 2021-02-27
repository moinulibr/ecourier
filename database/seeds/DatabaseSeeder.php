<?php

use Illuminate\Database\Seeder;
//use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // Order status
         DB::table('order_statuses')->insert([
            ['order_status' => 'Pending (Creted) Request '],
            ['order_status' => 'Office Accepted Request'],
            ['order_status' => 'Assigned Picker'],
            ['order_status' => 'Pickup Parcel'],
            ['order_status' => 'Office Received Parcel'],
            ['order_status' => 'Send to Hub'],
            ['order_status' => 'Hub Received Parcel'],
            ['order_status' => 'Send to Branch'],
            ['order_status' => 'Branch Received Parcel'],
            ['order_status' => 'Send to Agent'],
            ['order_status' => 'Agent Received Parcel'],
            ['order_status' => 'Preparing for Assign To Delivery'],
            ['order_status' => 'Assign To Delivery Man'],
            ['order_status' => 'Assign Request Accepted By Delivery Man'],
            ['order_status' => 'Assign Request Accepted'],
            ['order_status' => 'On the Way'],//Parcel Collected And
            ['order_status' => 'Delivery Processing'],
            ['order_status' => 'Successfully Delivered'],
            ['order_status' => 'Hold Delivery'],
            ['order_status' => 'Parcel Amout Send To Head Office'],
            ['order_status' => 'Parcel Amout Received Head Office'],
            ['order_status' => 'Head Office Send To Branch'],
            ['order_status' => 'Branch Received Parcel Amount From Head Office'],
            ['order_status' => 'Send To Client/Merchant'],
            ['order_status' => 'Client/Merchant Received Parcel Amount'],
            ['order_status' => 'Delivery Cycle Successfully Completed'],
            ['order_status' => 'Delivery Canceling'],
            ['order_status' => 'Delivery Canceled'],
            ['order_status' => 'Office Received Cancel Parcel'],
            ['order_status' => 'Send to Hub'],
            ['order_status' => 'Received Hub'],
            ['order_status' => 'Send to Head Office '],
            ['order_status' => 'Head Office Received'],
            ['order_status' => 'Send To Branch'],
            ['order_status' => 'Received Branch'],
            ['order_status' => 'Preparing Return Parcel'],
            ['order_status' => 'Assigned a Person For Return'],
            ['order_status' => 'On the Way For Return Parcel'],// Collected and 
            ['order_status' => 'Processing To Return Parcel'],//  
            ['order_status' => 'Merchant/Client Received Cancel Parcel'],//  
            ['order_status' => 'Send to Head Office'],//  
            ['order_status' => 'Head Office Received Parcel'],//  
         ]);
    }
}
