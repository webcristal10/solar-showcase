<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed Products
        Product::create([
            'name' => 'Mono Solar Panel 550W',
            'slug' => Str::slug('Mono Solar Panel 550W'),
            'description' => "Professional-grade monocrystalline solar panel with 550W peak power output. Engineered for optimal performance in both residential and commercial installations. Features advanced cell technology with maximum efficiency and durability.\n\nKey Benefits:\n• Superior energy conversion efficiency\n• Weather-resistant design for tropical climate\n• Easy installation on any roof type\n• Backed by comprehensive warranty\n• Ideal for hybrid solar systems\n\nPerfect for:\n• Home solar setups\n• Commercial installations\n• Agricultural applications\n• Off-grid systems",
            'short_description' => 'High-efficiency monocrystalline solar panel for residential and commercial use',
            'price' => 18500,
            'old_price' => 22000,
            'image' => 'product-1.jpg',
            'category' => 'Solar Panels',
            'featured' => true,
            'specifications' => [
                'power_output' => '550W',
                'type' => 'Monocrystalline',
                'efficiency' => '22.5%',
                'voltage' => '48V',
                'dimensions' => '2250 x 1130 x 35mm',
                'weight' => '24.5kg',
                'warranty' => '25 Years',
            ],
        ]);

        Product::create([
            'name' => 'Hybrid Solar Inverter',
            'slug' => Str::slug('Hybrid Solar Inverter'),
            'description' => "Advanced hybrid solar inverter combining solar, grid, and battery power management. Seamlessly switches between solar, grid, and battery power to ensure uninterrupted electricity supply.\n\nKey Features:\n• Real-time power monitoring\n• Automatic load management\n• Battery charging optimization\n• Grid-tie capability\n• Smart app control\n\nIdeal for:\n• Complete home backup systems\n• Load shedding solution\n• Off-grid applications\n• Commercial energy management",
            'short_description' => 'Intelligent inverter for solar, battery, and grid power management',
            'price' => 32000,
            'old_price' => 35000,
            'image' => 'product-2.jpg',
            'category' => 'Inverters',
            'featured' => true,
            'specifications' => [
                'power_rating' => '5000W',
                'output_voltage' => '220V/50Hz',
                'efficiency' => '98.5%',
                'battery_voltage' => '48V DC',
                'max_efficiency' => '99%',
                'warranty' => '5 Years',
                'cooling' => 'Passive',
            ],
        ]);

        Product::create([
            'name' => 'Tubular Solar Battery',
            'slug' => Str::slug('Tubular Solar Battery'),
            'description' => "Long-lasting tubular solar battery designed specifically for solar PV systems. Engineered to withstand deep discharge cycles and harsh weather conditions.\n\nAdvantages:\n• Extended cycle life (2000+ cycles)\n• Maintenance-free operation\n• High charge acceptance rate\n• Temperature resistant design\n• Cost-effective energy storage\n\nSuitable for:\n• Solar home systems\n• Backup power\n• Renewable energy storage\n• Remote applications",
            'short_description' => 'Durable tubular battery optimized for solar energy storage',
            'price' => 24500,
            'old_price' => 27000,
            'image' => 'product-3.jpg',
            'category' => 'Batteries',
            'featured' => true,
            'specifications' => [
                'capacity' => '150Ah',
                'voltage' => '12V',
                'cycle_life' => '2000+ cycles',
                'float_life' => '15-20 years',
                'weight' => '45kg',
                'dimensions' => '560 x 290 x 330mm',
                'warranty' => '3 Years',
            ],
        ]);

        Product::create([
            'name' => 'Solar Street Light',
            'slug' => Str::slug('Solar Street Light'),
            'description' => "All-in-one solar street light system with integrated LED bulb and rechargeable battery. Perfect for outdoor lighting without grid connection.\n\nFeatures:\n• Built-in motion sensor\n• Automatic on/off with dusk/dawn control\n• Bright LED output (5000K daylight)\n• Weather-resistant design\n• Easy installation\n\nIdeal for:\n• Street and pathway lighting\n• Park and garden illumination\n• Parking lot lighting\n• Rural area electrification",
            'short_description' => 'Complete solar lighting solution for outdoor spaces',
            'price' => 6800,
            'old_price' => 8000,
            'image' => 'product-4.jpg',
            'category' => 'Solar Lights',
            'featured' => true,
            'specifications' => [
                'solar_power' => '20W',
                'battery_capacity' => '2400mAh',
                'led_power' => '15W',
                'brightness' => '1200 Lumens',
                'color_temp' => '5000K',
                'warranty' => '2 Years',
                'light_duration' => '8-10 hours',
            ],
        ]);

        Product::create([
            'name' => 'MPPT Solar Controller',
            'slug' => Str::slug('MPPT Solar Controller'),
            'description' => "Maximum Power Point Tracking (MPPT) solar charge controller for optimized charging efficiency. Automatically adjusts charging parameters for maximum power extraction from solar panels.\n\nBenefits:\n• 30-40% more efficiency than PWM\n• Reduces charging time\n• Temperature compensation\n• Load control capability\n• Digital display monitoring\n\nSuitable for:\n• Solar battery charging systems\n• Hybrid power systems\n• Off-grid installations\n• Mobile solar systems",
            'short_description' => 'Smart MPPT controller for efficient solar battery charging',
            'price' => 7500,
            'old_price' => 9000,
            'image' => 'product-5.jpg',
            'category' => 'Controllers',
            'featured' => true,
            'specifications' => [
                'input_voltage' => '150V Max',
                'output_voltage' => '12/24/48V',
                'charge_current' => '60A Max',
                'efficiency' => '98%',
                'display' => 'Digital LCD',
                'warranty' => '3 Years',
                'protection' => 'Multi-level protection',
            ],
        ]);

        Product::create([
            'name' => 'Solar Mount Kit',
            'slug' => Str::slug('Solar Mount Kit'),
            'description' => "Complete mounting system for solar panel installation on rooftops. Durable aluminum frame with adjustable angles for optimal sun exposure.\n\nFeatures:\n• Corrosion-resistant aluminum\n• Adjustable tilt angle (0-45 degrees)\n• Easy installation system\n• Suitable for all roof types\n• Weather-proof design\n\nCompatible with:\n• Residential roof installations\n• Commercial setups\n• Ground-mounted systems\n• Solar tracking systems",
            'short_description' => 'Robust aluminum mounting system for solar panels',
            'price' => 2700,
            'old_price' => 4000,
            'image' => 'product-1.jpg',
            'category' => 'Accessories',
            'featured' => true,
            'specifications' => [
                'material' => 'Aluminum Alloy',
                'load_capacity' => '500kg',
                'tilt_angle' => '0-45 degrees',
                'warranty' => '10 Years',
                'compatible_panels' => 'All standard sizes',
                'installation' => 'Simple bolt-on system',
            ],
        ]);

        // Additional products for variety
        Product::create([
            'name' => 'Bifacial Solar Panel 600W',
            'slug' => Str::slug('Bifacial Solar Panel 600W'),
            'description' => 'Next-generation bifacial solar panel that captures solar radiation from both sides for increased power output.',
            'short_description' => 'Advanced bifacial panel capturing solar from both sides',
            'price' => 24000,
            'old_price' => 28000,
            'image' => 'product-2.jpg',
            'category' => 'Solar Panels',
            'featured' => false,
            'specifications' => [
                'power_output' => '600W',
                'type' => 'Bifacial Monocrystalline',
                'efficiency' => '24%',
                'front_efficiency' => '24%',
                'rear_efficiency' => '18%',
                'warranty' => '30 Years',
            ],
        ]);

        Product::create([
            'name' => 'PWM Charge Controller 60A',
            'slug' => Str::slug('PWM Charge Controller 60A'),
            'description' => 'Reliable PWM solar charge controller for cost-effective battery charging in smaller solar systems.',
            'short_description' => 'Budget-friendly PWM controller for solar battery systems',
            'price' => 3500,
            'old_price' => 4500,
            'image' => 'product-5.jpg',
            'category' => 'Controllers',
            'featured' => false,
            'specifications' => [
                'charge_current' => '60A Max',
                'input_voltage' => '100V Max',
                'efficiency' => '95%',
                'display' => 'LED indicators',
                'warranty' => '2 Years',
            ],
        ]);

        Product::create([
            'name' => 'Solar Cable & Connectors Kit',
            'slug' => Str::slug('Solar Cable & Connectors Kit'),
            'description' => 'Professional-grade solar cables and MC4 connectors for safe and efficient solar installations.',
            'short_description' => 'Complete wiring solution for solar panel connections',
            'price' => 1200,
            'old_price' => 1800,
            'image' => 'product-1.jpg',
            'category' => 'Accessories',
            'featured' => false,
            'specifications' => [
                'cable_gauge' => '6mm2',
                'connector_type' => 'MC4 Compatible',
                'length' => '50 meters per pack',
                'rating' => '1000V DC',
                'includes' => 'Cables, connectors, tools',
            ],
        ]);
    }
}
