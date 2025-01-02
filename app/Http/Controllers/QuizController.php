<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // Display the quiz page
    public function show()
    {
        return view('quiz');
    }

    // Handle quiz submission
    public function submit(Request $request)
    {
        $data = $request->all();

        // Logic to generate recommendations (use your existing method)
        $recommendations = $this->generateRecommendations($data);

        // Save or update results to the database
        $result = Result::updateOrCreate(
            ['user_id' => Auth::id()], // If a result exists, update it
            [
                'skin_type' => $recommendations['skin_type'],
                'ingredients' => json_encode($recommendations['ingredients']), // Store as JSON
                'tips' => json_encode($recommendations['tips']), // Store as JSON
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Quiz submitted successfully!');
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
                'ingredients' => ['Hyaluronic Acid', 'Ceramides', 'Squalane', 'Glycerin', 'Fatty Alcohols'],
                'tips' => [
                    'Use hydrating products like hyaluronic acid serums to boost moisture levels.',
                    'Apply a rich, ceramide-based moisturizer to lock in moisture.',
                    'Avoid harsh cleansers that strip natural oils. Use gentle, creamy cleansers.',
                    'Add facial oils (like Squalane) to prevent moisture loss during the day.',
                    'Consider using a humidifier in your home during winter to maintain skin hydration.'
                ]
            ],
            'oily' => [
                'skin_type' => 'Oily Skin',
                'ingredients' => ['Salicylic Acid', 'Niacinamide', 'Tea Tree Oil', 'Retinol', 'Witch Hazel'],
                'tips' => [
                    'Use a salicylic acid cleanser to deeply cleanse and control oil production.',
                    'Incorporate niacinamide to regulate sebum and improve skin texture.',
                    'Tea tree oil can help with acne and blemishes caused by excess oil.',
                    'Avoid heavy, greasy moisturizers; opt for gel-based or non-comedogenic products.',
                    'Exfoliate gently with AHA or BHA to prevent clogged pores and breakouts.'
                ]
            ],
            'combination' => [
                'skin_type' => 'Combination Skin',
                'ingredients' => ['Vitamin C', 'Green Tea Extract', 'Aloe Vera', 'Jojoba Oil', 'Benzoyl Peroxide'],
                'tips' => [
                    'Balance your routine with lightweight products for oily areas, while using richer products for drier spots.',
                    'Use Vitamin C for brightening and antioxidant protection on the entire face.',
                    'Apply gel-based moisturizers to hydrate without clogging pores, focusing on the T-zone.',
                    'Avoid harsh exfoliants that may irritate the drier areas of your face.',
                    'Spot treat breakouts with benzoyl peroxide or salicylic acid.'
                ]
            ],
            'sensitive' => [
                'skin_type' => 'Sensitive Skin',
                'ingredients' => ['Centella Asiatica', 'Chamomile', 'Oat Extract', 'Licorice Extract', 'Zinc Oxide'],
                'tips' => [
                    'Stick to fragrance-free and hypoallergenic products that won\'t cause irritation.',
                    'Use soothing ingredients like Centella Asiatica, Chamomile, and Aloe Vera to calm redness.',
                    'Avoid physical exfoliants and harsh active ingredients like acids or retinoids.',
                    'Licorice extract can brighten the skin and calm redness without irritation.',
                    'Use zinc oxide-based sunscreens for gentle, broad-spectrum sun protection.'
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
            $recommendations['tips'][] = 'Focus on acne-fighting ingredients like salicylic acid, tea tree oil, and benzoyl peroxide.';
            $recommendations['ingredients'][] = 'Salicylic Acid';
            $recommendations['ingredients'][] = 'Tea Tree Oil';
            $recommendations['ingredients'][] = 'Benzoyl Peroxide';
        }
    
        // Redness or irritation
        if ($data['redness'] === 'yes') {
            $recommendations['tips'][] = 'Reduce redness with soothing ingredients like Centella Asiatica, Green Tea Extract, and Chamomile.';
            $recommendations['ingredients'][] = 'Centella Asiatica';
            $recommendations['ingredients'][] = 'Green Tea Extract';
            $recommendations['ingredients'][] = 'Chamomile';
        }
    
        // Hyperpigmentation or dark spots
        if ($data['dark_spots'] !== 'no') {
            $recommendations['tips'][] = 'Use brightening ingredients like Vitamin C, Niacinamide, Licorice Extract, and Alpha Arbutin to target dark spots.';
            $recommendations['ingredients'][] = 'Vitamin C';
            $recommendations['ingredients'][] = 'Niacinamide';
            $recommendations['ingredients'][] = 'Licorice Extract';
            $recommendations['ingredients'][] = 'Alpha Arbutin';
        }
    
        // Dull skin or uneven tone
        if ($data['dullness'] === 'yes') {
            $recommendations['tips'][] = 'Incorporate AHAs or BHAs to exfoliate, brighten, and smooth the skin\'s texture.';
            $recommendations['ingredients'][] = 'AHA';
            $recommendations['ingredients'][] = 'BHA';
            $recommendations['ingredients'][] = 'Lactic Acid';
        }
    
        // Fine lines, wrinkles, or anti-aging
        if ($data['wrinkles'] !== 'no') {
            $recommendations['tips'][] = 'Incorporate anti-aging ingredients like Retinoids, Peptides, and Vitamin A to target wrinkles and improve skin elasticity.';
            $recommendations['ingredients'][] = 'Retinoids';
            $recommendations['ingredients'][] = 'Peptides';
            $recommendations['ingredients'][] = 'Vitamin A';
        }
    
        // Large pores
        if ($data['large_pores'] ?? false) {
            $recommendations['tips'][] = 'Use niacinamide to regulate oil production and minimize the appearance of pores, and consider clay masks for deep cleansing.';
            $recommendations['ingredients'][] = 'Niacinamide';
            $recommendations['ingredients'][] = 'Witch Hazel';
            $recommendations['ingredients'][] = 'Kaolin Clay';
        }
    
        // Combine all recommendations and remove duplicates
        $recommendations['ingredients'] = array_unique($recommendations['ingredients']);
        $recommendations['tips'] = array_unique($recommendations['tips']);
    
        return $recommendations;
    }
    
}

