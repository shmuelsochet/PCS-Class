<?php
require 'db.php';
$query = "SELECT r.img, f.name, f.company, f.flavor, m.net_wt_oz, m.serving_size_grams, m.serving_per_container, nf.calories, 
            fat.total_fat_g, fat.saturated_fat_g, fat.trans_fat_g, nf.cholesterol_mg, nf.sodium_mg, c.total_carbs_g,
            c.dietary_fiber_g, c.sugar_g, nf.protein_grams
        FROM foods f
        LEFT JOIN measurements m 
        ON f.id = m.food_id
        LEFT JOIN nutrition_facts nf 
        ON f.id = nf.food_id
        LEFT JOIN fat fat 
        ON nf.fat_id = fat.id
        LEFT JOIN carbs c 
        ON nf.carb_id = c.id 
        LEFT JOIN resources r 
        ON f.id = r.food_id ";

// $query = "SELECT * FROM foods";

$stmt = $db->query($query);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);
?>