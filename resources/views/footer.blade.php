<footer class="flex flex-col justify-between bg-gray-900 text-white w-full">
    @if(session('status'))
        <h3>{{session('status')}}</h3>
    @endif
    <div class="sections-container flex flex-col md:flex-row gap-y-12 md:gap-y-4 mx-[2em] md:mx-[4em] xl:mx-[8em] my-[2.5em]">
        <div class="flex flex-col w-[90%] md:w-[25%]">
            <h1 class="uppercase text-[16px] font-semibold underline underline-offset-8">{{$appSettings->website_name}}</h1>
            <div class="mt-3">
                <p class="w-[80%]">
                    Gadget Galaxy is a comprehensive online platform offering a wide range of cutting-edge gadgets and electronics, catering to tech enthusiasts and casual consumers alike.
                </p>
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
                <h3>{{$appSettings->address ?? 'address'}}</h3>
                <h3>{{$appSettings->phone1 ?? 'phone1'}}</h3>
                <h3>{{$appSettings->email1 ?? 'email1'}}</h3>
            </div>
        </div>
    </div>
    <div class="flex flex-row justify-center items-center my-10">
        <a target="_blank" href="https://icons8.com/icon/LiExshsLiiRn/smartphones">Gadget</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a>
    </div>
</footer>