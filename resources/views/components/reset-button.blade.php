<button {{ $attributes->merge(['type' => 'reset', 'class' => 'px-4 py-2 bg-transparent p-3 rounded-lg text-indigo-700 hover:bg-gray-200 hover:text-indigo-600 mr-2 font-medium tracking-wide capitalize transition-colors duration-200 transform rounded-md focus:outline-none focus:ring focus:border-blue-100 focus:ring-blue-200 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
