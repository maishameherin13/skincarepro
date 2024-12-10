<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->all();

        // Logic to generate recommendations (use your existing method)
        $recommendations = $this->generateRecommendations($data);

        // Save results to the database
        $result = Result::updateOrCreate(
            ['user_id' => Auth::id()], // If a result exists, update it
            [
                'skin_type' => $recommendations['skin_type'],
                'ingredients' => $recommendations['ingredients'],
                'tips' => $recommendations['tips'],
            ]
        );

        return redirect()->route('quiz.result', ['id' => Auth::id()]);
    }

    private function generateRecommendations($data)
    {
        $recommendations = [
            'tips' => [],
            'ingredients' => [],
            'skin_type' => '',
        ];
    
        // Map skin type to ingredients and tips
        $skinTypeMap = [
            'dry' => [
                'skin_type' => 'Dry Skin',
                'ingredients' => ['Hyaluronic Acid', 'Ceramides', 'Squalane'],
                'tips' => [
                    'Use hydrating products like hyaluronic acid serums.',
                    'Apply a rich, ceramide-based moisturizer.',
                    'Avoid harsh cleansers that strip natural oils.'
                ]
            ],
            'oily' => [
                'skin_type' => 'Oily Skin',
                'ingredients' => ['Salicylic Acid', 'Niacinamide', 'Tea Tree Oil'],
                'tips' => [
                    'Use a salicylic acid cleanser to control oil production.',
                    'Incorporate niacinamide to regulate sebum.',
                    'Avoid heavy or occlusive moisturizers.'
                ]
            ],
            'combination' => [
                'skin_type' => 'Combination Skin',
                'ingredients' => ['Vitamin C', 'Green Tea Extract', 'Aloe Vera'],
                'tips' => [
                    'Balance your routine with lightweight products for oily areas.',
                    'Use Vitamin C for brightening and antioxidant protection.',
                    'Apply gel-based moisturizers to hydrate without clogging pores.'
                ]
            ],
            'sensitive' => [
                'skin_type' => 'Sensitive Skin',
                'ingredients' => ['Centella Asiatica', 'Chamomile', 'Oat Extract'],
                'tips' => [
                    'Stick to fragrance-free and hypoallergenic products.',
                    'Use soothing ingredients like Centella Asiatica.',
                    'Avoid physical exfoliants and harsh active ingredients.'
                ]
            ],
        ];
    
        // Assign skin type-based recommendations
        if (isset($skinTypeMap[$data['skin_type']])) {
            $recommendations['skin_type'] = $skinTypeMap[$data['skin_type']]['skin_type'];
            $recommendations['ingredients'] = array_merge($recommendations['ingredients'], $skinTypeMap[$data['skin_type']]['ingredients']);
            $recommendations['tips'] = array_merge($recommendations['tips'], $skinTypeMap[$data['skin_type']]['tips']);
        }
    
        // Acne-prone skin
        if ($data['acne'] === 'frequently') {
            $recommendations['tips'][] = 'Focus on acne-fighting ingredients like salicylic acid and tea tree oil.';
            $recommendations['ingredients'][] = 'Salicylic Acid';
            $recommendations['ingredients'][] = 'Tea Tree Oil';
        }
    
        // Redness or irritation
        if ($data['redness'] === 'yes') {
            $recommendations['tips'][] = 'Reduce redness with soothing ingredients like Centella Asiatica and Green Tea Extract.';
            $recommendations['ingredients'][] = 'Centella Asiatica';
            $recommendations['ingredients'][] = 'Green Tea Extract';
        }
    
        // Hyperpigmentation or dark spots
        if ($data['dark_spots'] !== 'no') {
            $recommendations['tips'][] = 'Use brightening ingredients like Vitamin C and Niacinamide to target dark spots.';
            $recommendations['ingredients'][] = 'Vitamin C';
            $recommendations['ingredients'][] = 'Niacinamide';
        }
    
        // Dull skin or uneven tone
        if ($data['dullness'] === 'yes') {
            $recommendations['tips'][] = 'Incorporate AHAs or BHAs to exfoliate and brighten the skin.';
            $recommendations['ingredients'][] = 'AHA';
            $recommendations['ingredients'][] = 'BHA';
        }
    
        // Fine lines, wrinkles, or anti-aging
        if ($data['wrinkles'] !== 'no') {
            $recommendations['tips'][] = 'Incorporate anti-aging ingredients like retinoids and peptides to target wrinkles.';
            $recommendations['ingredients'][] = 'Retinoids';
            $recommendations['ingredients'][] = 'Peptides';
        }
    
        // // Seasonal impacts: Winter
        // if ($data['climate'] === 'cold_and_dry' || $data['climate'] === 'moderate') {
        //     $recommendations['tips'][] = 'Use thicker moisturizers during colder months.';
        //     $recommendations['ingredients'][] = 'Shea Butter';
        //     $recommendations['ingredients'][] = 'Urea';
        // }
    
        // // Seasonal impacts: Summer
        // if ($data['climate'] === 'hot_and_humid') {
        //     $recommendations['tips'][] = 'Switch to gel-based moisturizers and lightweight sunscreens during summer.';
        //     $recommendations['ingredients'][] = 'Zinc Oxide';
        //     $recommendations['ingredients'][] = 'Kaolin Clay';
        // }
    
        // Large pores
        if ($data['large_pores'] ?? false) { // Check if large_pores field exists
            $recommendations['tips'][] = 'Use niacinamide to reduce the appearance of large pores.';
            $recommendations['ingredients'][] = 'Niacinamide';
            $recommendations['ingredients'][] = 'Witch Hazel';
        }
    
        // Combine all recommendations and remove duplicates
        $recommendations['ingredients'] = array_unique($recommendations['ingredients']);
        $recommendations['tips'] = array_unique($recommendations['tips']);
    
        return $recommendations;
    }
    
}

