<footer class="flex justify-between bg-gray-900 text-white w-screen">
    @if(session('status'))
        <h3>{{session('status')}}</h3>
    @endif
    <div class="sections-container flex flex-col md:flex-row gap-y-12 md:gap-y-4 mx-[2em] md:mx-[4em] xl:mx-[8em] my-[2.5em]">
        <div class="flex flex-col w-[90%] md:w-[25%]">
            <h1 class="uppercase text-[16px] font-semibold underline underline-offset-8">Store</h1>
            <div class="mt-3">
                <p class="w-[80%]">This is a short paragraph about how this website is not fully constructed yet. I need to make more pages and fill out all the information.</p>
            </div>
        </div>
        <div class="flex flex-col w-[90%] md:w-[25%]">
            <h1 class="uppercase text-[16px] font-semibold underline underline-offset-8">Quick Links</h1>
            <div class="flex mt-3">
                <ul class="flex flex-col gap-y-2">
                    <li>Home</li>
                    <li>About Us</li>
                    <li>Contact Us</li>
                    <li>Blogs</li>
                    <li>Sitemap</li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col w-[90%] md:w-[25%]">
            <h1 class="uppercase text-[16px] font-semibold underline underline-offset-8">Shop Now</h1>
            <div class="flex mt-3">
                <ul class="flex flex-col gap-y-2">
                    <li>Collections</li>
                    <li>Trending Products</li>
                    <li>New Arrivals</li>
                    <li>Featured Products</li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col w-[90%] md:w-[25%]">
            <h1 class="uppercase text-[16px] font-semibold underline underline-offset-8">Reach Us</h1>
            <div class="flex flex-col mt-3 gap-y-2">
                <h3>333 Some Main Road, some area, some street, United States 22390</h3>
                <h3>813-743-0239</h3>
                <h3>samplewebsite@gmail.com</h3>
            </div>
        </div>
    </div>
</footer>