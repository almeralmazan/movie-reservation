<?php

use Carbon\Carbon;

class MovieTableSeeder extends Seeder {

    public function run()
    {
        DB::table('movies')->delete();

        Movie::create([
            'title'         =>  'How To Train Your Dragon 2',
            'description'   =>  "Set in the mythical world of burly Vikings and wild dragons, and based on the book by Cressida Cowell, the action comedy tells the story of Hiccup, a Viking teenager who doesn't exactly fit in with his tribe's longstanding tradition of heroic dragon slayers. Hiccup's world is turned upside down when he encounters a dragon that challenges he and his fellow Vikings to see the world from an entirely different point of view.",
            'image'         =>  'how-to-train-your-dragon-2.jpg',
            'trailer_url'   =>  'Z9a4PvzlqoQ',
            'showing_date'  =>  Carbon::now()->addDays(3),
            'cinema_id'     =>  1
        ]);

        Movie::create([
            'title'         =>  '22 Jump Street',
            'description'   =>  "After making their way through high school (twice), big changes are in store for officers Schmidt and Jenko when they go deep undercover at a local college.",
            'image'         =>  '22-jump-street.jpg',
            'trailer_url'   =>  'qP755JkDxyM',
            'showing_date'  =>  Carbon::now()->addDays(5),
            'cinema_id'     =>  2
        ]);

        Movie::create([
            'title'         =>  'Edge of Tomorrow',
            'description'   =>  "Lt. Col. Bill Cage is an officer who has never seen a day of combat when he is unceremoniously dropped into what amounts to a suicide mission. Killed within minutes, Cage now finds himself inexplicably thrown into a time loop - forcing him to live out the same brutal combat over and over, fighting and dying again - and again. But with each battle, Cage becomes able to engage the adversaries with increasing skill, alongside Special Forces warrior Rita Vrataski. And, as Cage and Rita take the fight to the aliens, each repeated encounter gets them one step closer to defeating the enemy.",
            'image'         =>  'edge-of-tomorrow.jpg',
            'trailer_url'   =>  'yUmSVcttXnI',
            'showing_date'  =>  Carbon::now()->addDays(7),
            'cinema_id'     =>  3
        ]);

        Movie::create([
            'title'         =>  'Blended',
            'description'   =>  "After a bad blind date, a man and woman find themselves stuck together at a resort for families, where their attraction grows as their respective kids benefit from the burgeoning relationship.",
            'image'         =>  'blended.jpg',
            'trailer_url'   =>  '8MuWt2X59fo',
            'showing_date'  =>  Carbon::now()->addDays(9),
            'cinema_id'     =>  4
        ]);

        Movie::create([
            'title'         =>  'Maleficent',
            'description'   =>  "The 'Sleeping Beauty' tale is told from the perspective of the villainous Maleficent and looks at the events that hardened her heart and drove her to curse young Princess Aurora.",
            'image'         =>  'maleficent.jpg',
            'trailer_url'   =>  'EYemY3xFsB4',
            'showing_date'  =>  Carbon::now()->addDays(11),
            'cinema_id'     =>  5
        ]);

        Movie::create([
            'title'         =>  'Noah',
            'description'   =>  "A man is chosen by his world's creator to undertake a momentous mission before an apocalyptic flood cleanses the world.",
            'image'         =>  'noah.jpg',
            'trailer_url'   =>  '_OSaJE2rqxU',
            'showing_date'  =>  Carbon::now()->addDays(13),
            'cinema_id'     =>  6
        ]);

        Movie::create([
            'title'         =>  'In The Blood',
            'description'   =>  "When her husband goes missing during their Caribbean vacation, a woman sets off on her own to take down the men she thinks are responsible.",
            'image'         =>  'in-the-blood.jpg',
            'trailer_url'   =>  'eLj87gSx2U0',
            'showing_date'  =>  Carbon::now()->addDays(15),
            'cinema_id'     =>  7
        ]);

        Movie::create([
            'title'         =>  '300: Rise Of An Empire',
            'description'   =>  "Based on Frank Miller's latest graphic novel Xerxes and told in the breathtaking visual style of the blockbuster '300,' this new chapter of the epic saga takes the action to a fresh battlefield on the sea as Greek general Themistokles (Sullivan Stapleton)attempts to unite all of Greece by leading the charge that will change the course of the war. '300: Rise of an Empire' pits Themistokles against the massive invading Persian forces led by mortal-turned-god Xerxes (Rodrigo Santoro), and Artemesia (Eva Green), vengeful commander of the Persian navy. ",
            'image'         =>  '300-rise-of-an-empire.jpg',
            'trailer_url'   =>  'G3Rzy7YqUVU',
            'showing_date'  =>  Carbon::now()->addDays(17),
            'cinema_id'     =>  8
        ]);

        Movie::create([
            'title'         =>  'The Fault In Our Stars',
            'description'   =>  "Hazel and Gus are two extraordinary teenagers who share an acerbic wit, a disdain for the conventional, and a love that sweeps them - and us - on an unforgettable journey. Their relationship is all the more miraculous, given that they met and fell in love at a cancer support group. THE FAULT IN OUR STARS, based upon the number-one bestselling novel by John Green, explores the funny, thrilling and tragic business of being alive and in love.",
            'image'         =>  'the-fault-in-our-stars.jpg',
            'trailer_url'   =>  'AuVjGbncgQE',
            'showing_date'  =>  Carbon::now()->addDays(19),
            'cinema_id'     =>  9
        ]);

        Movie::create([
            'title'         =>  'X-Men: Days of Future Past',
            'description'   =>  "'Days of Future Past' is a popular storyline in the Marvel Comics comic book The Uncanny X-Men issues #141 and #142, published in 1981. It deals with a dystopian alternative future in which mutants are incarcerated in internment camps. An older Kitty Pryde transfers her mind into the younger, present-day Kitty Pryde, who brings the X-Men to prevent a fatal moment in history which triggers anti-mutant hysteria.",
            'image'         =>  'xmen-days-of-future-past.jpg',
            'trailer_url'   =>  'gsjtg7m1MMM',
            'showing_date'  =>  Carbon::now()->addDays(21),
            'cinema_id'     =>  10
        ]);
    }
}