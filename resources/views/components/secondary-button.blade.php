<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-600 rounded-md dark:bg-gray-800 hover:bg-gray-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-500 dark:focus:bg-gray-700 focus:ring focus:border-blue-200 focus:ring-blue-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
