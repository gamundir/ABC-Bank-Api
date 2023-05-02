<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contact1 = Contact::create(['first_name' => 'Christian',
                                     'last_name' => 'Gamundi',
                                     'date_of_birth' => '31/7/1997',
                                     'personal_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfapDK3LjAiIe-GRPFVxpZAow9UqxFEeszkQycWzHh&s']);
        $contact2 = Contact::create(['first_name' => 'Aylin',
                                     'last_name' => 'Marrero',
                                     'date_of_birth' => '16/6/1995',
                                     'personal_photo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGNIfwjotUNInUc6wNKYhZ-UdEQ_1JmyOBYLRLV2-x&s']);

        $contact1->addresses()->createMany([
            ['address' => 'calle 249 e/240 y 242, Boyeros, La Habana'],
            ['address' => '305 Malecon e/ Manrique y Campanario'],
        ]);
        $contact1->phoneNumbers()->createMany([
            ['phone_number' => '76469566'],
            ['phone_number' => '58358092'],
        ]);

        $contact2->addresses()->createMany([
            ['address' => '305 Malecon e/ Manrique y Campanario'],
            ['address' => 'calle 249 e/240 y 242, Boyeros, La Habana']
        ]);
        $contact2->phoneNumbers()->createMany([
            ['phone_number' => '78611723'],
            ['phone_number' => '53546827'],
	    ]);
    }
}
