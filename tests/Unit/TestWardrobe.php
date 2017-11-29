<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Wardrobe\Models\User;
use Wardrobe\Models\City;
use Wardrobe\Models\Country;

use Wardrobe\Models\Wardrobe;
class TestWardrobe extends TestCase
{
    use DatabaseMigrations;

    public function test_wardrobe_inmemory_creation()
    {
        $item = factory(Wardrobe::class)->make();

        $this->assertTrue(isset($item));
        $this->assertTrue(is_integer($item->creator_id));
        $this->assertTrue(is_string($item->name));
    }

    public function test_wardrobe_creation_adding()
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


        $wrd = Wardrobe::create([
            'name'=> '111',
            'creator_id'=> '1',
        ]);

        $latest_wrd = Wardrobe::latest()->first();

        //creation check
        $this->assertEquals($wrd->id, $latest_wrd->id);
        $this->assertEquals('111', $latest_wrd->name);
        $this->assertEquals('1', $latest_wrd->creator_id);

        //adding check
        $this->assertDatabaseHas('wardrobe', ['id' => 1, 'name' => '111']);
    }


    public function test_wardrobe_find()
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

        $wrd = Wardrobe::create([
            'name'=> '111',
            'creator_id'=> '1',
        ]);

        $found_wrd = Wardrobe::find(1);
        //creation check
        $this->assertEquals($wrd->id, $found_wrd->id);
        $this->assertEquals('111', $found_wrd->name);
        $this->assertEquals('1', $found_wrd->creator_id);


    }

}
