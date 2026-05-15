@extends('layouts.app')

@section('content')

<section class="py-24 text-center bg-[var(--color-soft-bg)]">
    <div class="max-w-7xl mx-auto px-4">

        <h1 class="text-5xl font-bold text-[var(--color-dark)] mb-6">
            Premium Solar Energy Solutions
        </h1>

        <p class="text-lg text-[var(--color-muted)] max-w-2xl mx-auto mb-8">
            Explore high-quality solar inverters, batteries, and renewable energy products for homes and businesses.
        </p>

        <div class="flex justify-center gap-4">
            <a href="#"
               class="px-8 py-4 rounded-xl bg-[var(--color-primary)] text-white font-semibold hover:bg-[var(--color-primary-dark)] transition">
                Explore Products
            </a>

            <a href="#"
               class="px-8 py-4 rounded-xl border border-[var(--color-border)] font-semibold hover:bg-white transition">
                Contact Us
            </a>
        </div>

    </div>
</section>

@endsection
