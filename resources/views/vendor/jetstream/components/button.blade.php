<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gold-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gold-700 active:bg-gold-900 focus:outline-none focus:border-gold-900 focus:ring focus:ring-gold-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
