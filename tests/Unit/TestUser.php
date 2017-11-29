<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Wardrobe\Models\User;
use Wardrobe\Models\City;
use Wardrobe\Models\Country;
class TestUser extends TestCase
{
    use DatabaseMigrations;

    /*
    public function tearUp(){
        $this->country = Country::create([
            'name'=> 'country1'
        ]);

        $this->city = City::create([
            'name'=> 'country1', 'country_id'=>'1'
        ]);
    }
*/

    public function testy_user_inmemor_creation()
    {
        $user = factory(User::class)->make();

        //var_dump($user);

        $this->assertTrue(isset($user));
        $this->assertTrue(is_integer($user->country_id));
        $this->assertTrue(is_integer($user->city_id));
        $this->assertTrue(is_string($user->name));
    }


    public function test_user_creation_adding()
    {

        $country = Country::create([
            'name'=> 'country1'
        ]);

        $city = City::create([
            'name'=> 'country1', 'country_id'=>'1'
        ]);


        $user = User::create([
            'email'=> '11',
            'password'=> '11',
            'name'=> '11',
            'surname'=> '11',
            'phone'=> '11',
            'date_of_birth'=> '2017-11-02 16:05:57',
            'country_id'=> '1',
            'city_id'=> '1',
            'is_block'=> '1'
        ]);

        // var_dump($user);

        $latest_user = User::latest()->first();

        //creation check
        $this->assertEquals($user->id, $latest_user->id);
        $this->assertEquals('11', $latest_user->name);
        $this->assertEquals('11', $latest_user->surname);

        //adding check
        //assert if such record is not in DB
        $this->assertDatabaseHas('users', ['id' => 1, 'name' => '11', 'surname' => '11']);
    }


    public function test_user_find()
    {
        $country = Country::create([
            'name'=> 'country1'
        ]);

        $city = City::create([
            'name'=> 'country1', 'country_id'=>'1'
        ]);

        $user = User::create([
            'email'=> '11',
            'password'=> '11',
            'name'=> '11',
            'surname'=> '11',
            'phone'=> '11',
            'date_of_birth'=> '2017-11-02 16:05:57',
            'country_id'=> '1',
            'city_id'=> '1',
            'is_block'=> '1'
        ]);

        $found_user = User::find(1);

        //creation check
        $this->assertEquals($user->id, $found_user->id);
        $this->assertEquals('11', $found_user->name);
        $this->assertEquals('11', $found_user->surname);
    }

    public function test_user_delete()
    {
        $country = Country::create([
            'name'=> 'country1'
        ]);
        $city = City::create([
            'name'=> 'country1', 'country_id'=>'1'
        ]);
        $user = User::create([
            'email'=> '11',
            'password'=> '11',
            'name'=> '11',
            'surname'=> '11',
            'phone'=> '11',
            'date_of_birth'=> '2017-11-02 16:05:57',
            'country_id'=> '1',
            'city_id'=> '1',
            'is_block'=> '1'
        ]);

        $found_user = User::find(1);

        $found_user->delete();

        //adding check
         $this->assertDatabaseMissing('users', ['id' => 1, 'name' => '11', 'surname' => '11']);
    }
}
