<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
       
        $blogs = [
            [
                'id' => 1,
                'title' => 'Nourish Your Skin: The Key Role of Vegetables in Skin Health',
                'description' => 'Beautiful, radiant skin is not just a result of good genetics or expensive skincare products; it’s also closely tied to what you eat.' ,
                'date' => '2023-11-24',
                'author' => 'John Doe',
                'external_link' => 'https://www.farmerjonesfarm.com/blogs/news/nourish-your-skin-the-key-role-of-vegetables-in-skin-health#:~:text=A%20diet%20rich%20in%20vitamin,to%20reduce%20redness%20and%20inflammation',
                'image' => 'https://www.farmerjonesfarm.com/cdn/shop/articles/Carrots_1_of_1_-resize_900x.jpg?v=1700611768'
            ],
            [
                'id' => 2,
                'title' => 'Eating This Tiny Seed Will Give You Glowing Skin',
                'description' => 'Seeds are something of an underrated superfood. Many seeds are packed with health benefits–think flax, pumpkin, hemp, buckwheat, and sesame–but if...',
                'date' => '2024-13-22',
                'author' => 'María Quiles',
                'external_link' => 'https://www.vogue.com/article/chia-seed-skin-benefits',  
                'image'=>'https://assets.vogue.com/photos/65fdc700d2d37588926617b4/master/w_1600,c_limit/ben-scott-tWb7IsL9CnY-unsplash.jpg',
            ],
            [
                'id' => 3,
                'title' => 'Practical gifts for healthy, protected skin according to dermatologists',
                'description' => 'When it comes to holiday gift-giving, everyone appreciates a gift they can use and enjoy often. That’s why we love to give skin care that helps support healthy, protected skin. To guide you in ..',
                'date' => '2024-12-10',
                'author' => 'Aaron',
                'external_link' => 'https://www.lovelyskin.com/blog/p/useful-christmas-gifts-dermatologist-approved',
                'image'=>'https://8c3412d76225d04d7baa-be98b6ea17920953fb931282eff9a681.images.lovelyskin.com/m0kpoikq_202411271702329290.jpg'  
            ],
            [
                'id' => 4,
                'title' => 'Protect Against Skin Cancer with These Sun Safety Tips',
                'description' => 'Sun protection isn’t just for hot summer days. Harmful ultraviolet rays can affect your skin year-round, even when it’s cloudy or cold. Here’s how to protect yourself and reduce the risk of skin cancer....',
                'date' => '2024-10-14',
                'author' => 'Annie Doyle',
                'external_link' => 'https://www.healthline.com/health/beauty-skin-care/vitamin-c-serum-benefits',  
                'image'=>'https://www.dwoseth.com/wp-content/uploads/2024/11/GettyImages-1177664669-768x512.jpg'
            ],
            [
                'id' => 5,
                'title' => 'What Does Vitamin C Do for Your Skin?',
                'description' => 'Vitamin C—also known as ascorbic acid—is a water-soluble nutrient that plays an important role in keeping ....',
                'date' => '2024-11-10',
                'author' => ' Lindsay Curtis ',
                'external_link' => 'https://www.verywellhealth.com/vitamin-c-for-skin-5084225',  
                'image'=>'https://www.verywellhealth.com/thmb/vtwoRNjnKBXcg19okgRyIjVUwoo=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/vitamin-c-for-skin-5084225_final-80108490652043118c0a0c8898be6314.jpg'
            ],
            [
                'id' => 6,
                'title' => 'The hype on hyaluronic acid',
                'description' => 'As dermatologists, we often hear questions from patients about ingredients in beauty and skincare products. Recently, hyaluronic acid (HA) ..',
                'date' => '2023-01-23',
                'author' => ' Kristina Liu, MD, MHS, Contributor, and Janelle Nassim, MD, ',
                'external_link' => 'https://www.health.harvard.edu/blog/the-hype-on-hyaluronic-acid-2020012318653',  
                'image'=>'https://domf5oio6qrcr.cloudfront.net/medialibrary/10023/bottle-pipette-splash-of-water.jpg'
            ],

            
        ];

        return view('blogs.index', compact('blogs'));
    }

   
   
}
