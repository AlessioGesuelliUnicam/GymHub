<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Subscription;
use App\Models\ClientSubscription;
use App\Models\Diet;
use App\Models\Role;
use App\Models\Staff;
use App\Models\TrainingSheet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //inizio clienti
/*
        $client = new Client();
        $client->name = 'Andrea';
        $client->surname = 'Giuliani';
        $client->birth_date = '2001-12-22';
        $client->city_residence = 'Tolentino';
        $client->address_residence = 'Andrea';
        $client->phone_number = '3483828362';
        $client->email = 'giulianiandrea221201@gmail.com';
        $client->med_cert = '/img/prova1.png';
        $client->med_cert_exp = '2001-12-22';
        $client->free_entry = '2001-12-22';
        $client->CF = 'GLNNDR01T22I156E';

        $client1 = new Client();
        $client1->name = 'Alessio';
        $client1->surname = 'Gesuelli';
        $client1->birth_date = '2001-12-14';
        $client1->city_residence = 'Tolentino';
        $client1->address_residence = 'Giacomo Brodolini 17';
        $client1->phone_number = '3334564567';
        $client1->email = 'alessiogesuelli221201@gmail.com';
        $client1->med_cert = '/img/prova2.png';
        $client1->med_cert_exp = '2023-12-14';
        $client1->free_entry = '2022-12-15';
        $client1->CF = 'GLNNDR01T22I156E';

        $client2 = new Client();
        $client2->name = 'Lorenzo';
        $client2->surname = 'Salvatori';
        $client2->birth_date = '2001-12-13';
        $client2->city_residence = 'Pollenza';
        $client2->address_residence = 'Via pollentini 12';
        $client2->phone_number = '23455644564';
        $client2->email = 'lorenzosbronx221201@gmail.com';
        $client2->med_cert = '/img/prova3.png';
        $client2->med_cert_exp = '2023-12-12';
        $client2->free_entry = '2022-12-06';
        $client2->CF = 'GLNNDR01T22I156E';

        $client3 = new Client();
        $client3->name = 'Stefano';
        $client3->surname = 'Bisonni';
        $client3->birth_date = '2001-12-13';
        $client3->city_residence = 'Tolentino';
        $client3->address_residence = 'Via Paolo Pace 16';
        $client3->phone_number = '3466445644';
        $client3->email = 'stefanobisonni221201@gmail.com';
        $client3->med_cert = '/img/prova3.png';
        $client3->med_cert_exp = '2022-12-05';
        $client3->free_entry = '2012-12-22';
        $client3->CF = 'GLNNDR01T22I156E';

        $client4 = new Client();
        $client4->name = 'Sofia';
        $client4->surname = 'Martinelli';
        $client4->birth_date = '2001-12-03';
        $client4->city_residence = 'Macerata';
        $client4->address_residence = 'Via Maceratini 12';
        $client4->phone_number = '23456432344';
        $client4->email = 'sofiamartinelli221201@gmail.com';
        $client4->med_cert = '/img/prova4.png';
        $client4->med_cert_exp = '2001-12-03';
        $client4->free_entry = '2001-12-03';
        $client4->CF = 'GLNNDR01T22I156E';


        $client->save();
        $client1->save();
        $client2->save();
        $client3->save();
        $client4->save();
*/
        //fine clienti
        //--------------------------------
        //inizio role
/*
        $role = new Role();
        $role->type = 'Admin';
        $role->save();

        $role1 = new Role();
        $role1->type = 'Personal Trainer';
        $role1->save();

        $role2 = new Role();
        $role2->type = 'Nutrizionista';
        $role2->save();
*/
        //fine role
        //--------------------------------
        //inizio staff
/*
        $staff = new Staff();
        $staff->name = 'Alessio';
        $staff->surname = 'Gesuelli';
        $staff->birth_date = '2001-12-14';
        $staff->city_residence = 'Tolentino';
        $staff->address_residence = 'Giacomo Brodolini 17';
        $staff->phone_number = '3204187236';
        $staff->email = 'alessio.gesuelli1@gmail.com';
        $staff->id_role = '1';
        $staff->save();

        $staff1 = new Staff();
        $staff1->name = 'Lorenzo';
        $staff1->surname = 'Salvatori';
        $staff1->birth_date = '2001-03-28';
        $staff1->city_residence = 'Pollenza';
        $staff1->address_residence = 'Pollentini';
        $staff1->phone_number = '2572572';
        $staff1->email = 'lorenzo.salvatori@gmail.com';
        $staff1->id_role = '2';
        $staff1->save();

        $staff2 = new Staff();
        $staff2->name = 'Andrea';
        $staff2->surname = 'Giuliani';
        $staff2->birth_date = '2001-12-22';
        $staff2->city_residence = 'Tolentino';
        $staff2->address_residence = 'Pietro Nenni';
        $staff2->phone_number = '752752';
        $staff2->email = 'andrea.giuliani@gmail.com';
        $staff2->id_role = '3';
        $staff2->save();
*/
        //fine staff
        //--------------------------------------------
        //inizio subscription
/*
        $subscription = new Subscription();
        $subscription->duration = 1;
        $subscription->price = 50;

        $subscription2 = new Subscription();
        $subscription2->duration = 3;
        $subscription2->price = 110;

        $subscription3 = new Subscription();
        $subscription3->duration = 6;
        $subscription3->price = 200;

        $subscription4 = new Subscription();
        $subscription4->duration = 12;
        $subscription4->price = 350;

        $subscription->save();
        $subscription2->save();
        $subscription3->save();
        $subscription4->save();
*/
        //inizio trainingsheet

        $trainingSheet = new TrainingSheet();
        $trainingSheet->client_id = '2';
        $trainingSheet->training_sheet = 'url/scheda';
        $trainingSheet->save();

        $trainingSheet1 = new TrainingSheet();
        $trainingSheet1->client_id = '1';
        $trainingSheet1->training_sheet = 'url/scheda4';
        $trainingSheet1->save();


        //fine training sheet
        //---------------------------------------------------
        //inizio diet

        $diet = new Diet();
        $diet->client_id = '2';
        $diet->diet = 'url/dieta';
        $diet->save();

        $diet1 = new Diet();
        $diet1->client_id = '1';
        $diet1->diet = 'url/dieta4';
        $diet1->save();

        //fine diet
        //----------------------------------------------


        //inizio clientsubscription

        $clientSubscription = new ClientSubscription();
        $clientSubscription->client_id = '2';
        $clientSubscription->subscription_id = '1';
        $clientSubscription->start_subscription = '2023-05-25';
        $clientSubscription->end_subscription = '2023-05-25';
        $clientSubscription->save();

        $clientSubscription1 = new ClientSubscription();
        $clientSubscription1->client_id = '1';
        $clientSubscription1->subscription_id = '2';
        $clientSubscription1->start_subscription = '2022-08-05';
        $clientSubscription1->end_subscription = '2023-05-25';
        $clientSubscription1->save();

        //fine clientsubscription


    }
}
