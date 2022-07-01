<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->foreignId('category_id');
            $table->foreignId("user_id");
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};

// Post::create([
//     "title" => "Mega Kuningan",
//     "category_id" => 1,
//     "slug" => "hotel-mega-kuningan",
//     "excerpt" => "GP Mega Kuningan Hotel offers a luxurious stay in South Jakarta. Operating a 24-hour front desk, it features a restaurant and a coffee house. WiFi is accessible for free in all areas. MRT Bendungan Hilir is 2.4 km away.",
//     "body" => "<p>A 20-minute drive from GP Mega Kuningan Hotel leads to Kuningan City, Plaza Indonesia and Grand Indonesia shopping malls, while Epicentrum and Plaza Festival shopping centres are a 15-minute drive away. Gelora Bung Karno's Main Gate is 6.2 km away. The hotel is reachable by a 45-minute car ride from Soekarno-Hatta International Airport.</p><p>Air-conditioned rooms are well appointed with a flat-screen cable TV, safety deposit box and an electric kettle. A work space with a seating area is also available. En suite bathroom provides a hairdryer, hot shower facilities and free toiletries.Luggage storage facilities and newspapers are available in the lobby area. Guests can check emails in the business centre, while staff can arrange airport transfers and provide laundry service.Teratai Restaurant serves a spread of international favourites. Breakfast and other meals can also be enjoyed in the privacy of guests' rooms.Couples particularly like the location — they rated it 8.7 for a two-person trip GP Mega Kuningan Jakarta has been welcoming Booking.com guests since 11 Oct 2013.</p>"])

//     Post::create([
//     "title" => "Hotel Kempinski Jakarta",
//     "category_id" => 1,
//     "slug" => "hotel-kempinski-jakarta",
//     "excerpt" => "GP Mega Kuningan Hotel offers a luxurious stay in South Jakarta. Operating a 24-hour front desk, it features a restaurant and a coffee house. WiFi is accessible for free in all areas. MRT Bendungan Hilir is 2.4 km away.",
//     "body" => "<p>International and Asian dishes are served at the on-site Signatures Restaurant, while Paulaner Brauhaus offers home-brewed beers. OKU Japanese Restaurant serves Japanese food that combines modern take and traditional flavours. Kempi Deli presents a range of amazing cakes, and can also cater to customised cake requests.</p><p>Modern décor and floor-to-ceiling windows feature throughout the spacious guestrooms at Kempinski Indonesia. Each well-appointed room comes with a flat-screen TV, and an en suite bathroom with a bathtub and rain shower.</p>"])

//     Post::create([
//     "title" => "Beehouse Dijiwa Ubud",
//     "category_id" => 2,
//     "slug" => "villas-beehouse-dijiwa-ubud",
//     "excerpt" => "With pool views, Beehouse Dijiwa Ubud is located in Ubud and has a restaurant, a 24-hour front desk, bar, garden, year-round outdoor pool and terrace. Complimentary WiFi is provided throughout the property.",
//     "body" => "<p>Goa Gajah is 2.4 km from the accommodation, while Monkey Forest Ubud is 2.6 km away. The nearest airport is Ngurah Rai International Airport, 37 km from Beehouse Dijiwa Ubud</p><p>The villa offers a seating area with a TV and a private bathroom with bathrobes, slippers and hot tub. A balcony with garden views is offered in all units. à la carte and American breakfast options are available daily at Beehouse Dijiwa Ubud. This is our guests' favourite part of Ubud, according to independent reviews.</p>"])

//     Post::create([
//     "title" => "Adiwana Arkara Resort",
//     "category_id" => 2,
//     "slug" => "villas-adiwana-arkara-resort",
//     "excerpt" => "Situated in Ubud, Adiwana Arkara Resort offers pool views and free WiFi throughout, 3.1 km from Ubud Monkey Forest and 4.3 km from The Blanco Renaissance Museum.",
//     "body" => "<p>Providing a terrace, some units are air conditioned and feature a dining area and a seating area with a satellite flat-screen TV. Some units also have a kitchenette equipped with a dishwasher.</p><p>All day breakfast is available in the room or at the restaurant. At the villa you will find a restaurant serving Asian cuisine. Ubud Palace is 5 km from the accommodation, while Ubud Market is 5 km away. The nearest airport is Ngurah Rai International, 36 km from Adiwana Arkara Resort, and the property offers a free shuttle to Ubud centre Couples particularly like the location — they rated it 8.3 for a two-person trip</p>"])