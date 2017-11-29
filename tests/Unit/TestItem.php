<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Wardrobe\Models\Type;
use Wardrobe\Models\Item;
use Wardrobe\Models\User;
use Wardrobe\Models\City;
use Wardrobe\Models\Country;
class TestItem extends TestCase
{
    use DatabaseMigrations;

    public function test_item_inmemory_creation()
    {
        $item = factory(Item::class)->make();

        var_dump($item);

        $this->assertTrue(isset($item));
        $this->assertTrue(is_integer($item->creator_id));
        $this->assertTrue(is_integer($item->type_id));
        $this->assertTrue(is_string($item->name));
    }

    public function test_item_creation_adding()
    {
        $type = Type::create([
            'name'=> 'type1'
        ]);

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


        $item = Item::create([
            'name'=> '11',
            'type_id'=> '1',
            'path'=> '11',
            'creator_id'=> '1',
        ]);

        // var_dump($user);

        $latest_item = Item::latest()->first();

        //creation check
        $this->assertEquals($item->id, $latest_item->id);
        $this->assertEquals('11', $latest_item->name);
        $this->assertEquals('11', $latest_item->path);

        //adding check
        $this->assertDatabaseHas('items', ['id' => 1, 'path' => '11']);
    }


    public function test_item_find()
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
        $type = Type::create([
            'name'=> 'type1'
        ]);


        $item = Item::create([
            'name'=> '11',
            'type_id'=> '1',
            'path'=> '11',
            'creator_id'=> '1',
        ]);

        // var_dump($user);

        $found_item = Item::find(1);

        //creation check
        $this->assertEquals($item->id, $found_item->id);
        $this->assertEquals('11', $found_item->name);
        $this->assertEquals('11', $found_item->path);

        //adding check
       // $this->assertDatabaseHas('items', ['id' => 1, 'path' => '11']);

    }

    public function test_item_delete()
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
        $type = Type::create([
            'name'=> 'type1'
        ]);

        $item = Item::create([
            'name'=> '11',
            'type_id'=> '1',
            'path'=> '11',
            'creator_id'=> '1',
        ]);

        // var_dump($user);

        $found_item = Item::find(1);
        $found_item->delete();

        //adding check
        $this->assertDatabaseMissing('items', ['id' => 1, 'path' => '11']);
    }
}
