@extends('main')
@section("content")
<div class="container py-[2em] px-[2em] md:[4em] xl:px-[10em] flex flex-col md:flex-row m-0 w-screen bg-[#EFF2F6]">
    <div class="left-side w-[100%] md:w-[60%] md:mx-4 my-4 md:my-0  flex flex-col items-center bg-[#EFF2F6]">
        <div class="image-container w-[100%] flex justify-center items-center">
            {{-- <img src={{$product['gallery']}} class="w-[30em] h-[25em]" /> --}}
            @include('carousel')
        </div>
        {{-- <div class="image-slider flex justify-center items-center w-[100%] h-[10em] bg-white">Images</div> --}}
    </div>
    <div class="right-side w-[100%] md:w-[40%] flex flex-col bg-[#EFF2F6] gap-y-5">
        <div class="product-specs-container flex flex-col gap-y-2 w-[100%] bg-white px-[1.5em] py-[1em] rounded">
            <div class="product-name text-[18px] font-semibold">{{$product['name']}}</div>
            <div class="product-price text-[20px] font-bold">${{$product['price']}}</div>
            <div class="product-description text-[14px] font-light">{{$product['description']}}</div>
            <div class="color-options-container">
                <h3 class="font-light text-[14px]">Color: Red</h3>
                <div class="color-options flex flex-row gap-x-2 mt-1">
                    <div class="color-circle w-[2em] h-[2em] bg-red-200 rounded-full cursor-pointer border-black border-2"></div>
                    <div class="color-circle w-[2em] h-[2em] bg-blue-200 rounded-full cursor-pointer"></div>
                    <div class="color-circle w-[2em] h-[2em] bg-gray-200 rounded-full cursor-pointer"></div>
                    <div class="color-circle w-[2em] h-[2em] bg-yellow-200 rounded-full cursor-pointer"></div>
                    <div class="color-circle w-[2em] h-[2em] bg-green-200 rounded-full cursor-pointer"></div>
                </div>
            </div>
            <div class="button-container flex flex-col gap-y-3 my-2">
                <button class="add-to-cart-button bg-black text-white w-[100%] py-3">Add to Cart</button>
                <button class="save-for-later-button bg-white border-2 border-black w-[100%] py-3">Buy Now</button>
            </div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="details-container bg-white px-[1.5em] py-[1em] rounded">
            <div class="tabs flex flex-row justify-between items-center">
                <div>
                    <span class="uppercase text-[16px] font-semibold underline underline-offset-8">Description</span>
                </div>
                <div>
                    <span class="uppercase text-[16px] font-medium">Details</span>
                </div>
                <div>
                    <span class="uppercase text-[16px] font-medium">Specs</span>
                </div>
            </div>
            <div class="tab-content my-4">
                <p class="text-[14px] font-light">Introducing the latest Samsung Phone, a cutting-edge device that combines sleek design with powerful performance. Packed with innovative features and advanced technology, this phone is designed to enhance your mobile experience like never before.</p>
                <ul class="list-disc mt-4 text-[14px] font-light mx-5">
                    <li> Immerse yourself in vibrant visuals with the Samsung Phone's stunning display</li>
                    <li>Experience lightning-fast performance and seamless multitasking </li>
                    <li>Capture every moment in stunning detail with the Samsung Phone's high-resolution camera</li>
                    <li>Protect your personal data with advanced security features</li>
                    <li>Stay connected all day long with the Samsung Phone's long-lasting battery life</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection