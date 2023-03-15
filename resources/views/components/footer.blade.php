<div class="flex mt-auto items-center justify-evenly sm:justify-between flex-col sm:flex-row sm:px-[30px] md:px-[40px] lg:px-[50px] xl:px-[75px] w-full h-[80px] bg-gray-900 h-14 bg-gradient-to-r from-purple-500 to-pink-500" id="footer">
    <a class="text-neutral-50 font-semibold" href="mailto:{{ $info['personal_info']['email'] }}">{{ $info['personal_info']['email'] }}</a>
    <div class="text-neutral-50 font-semibold">{{ $info['personal_info']['full_name'] }} / {{ $info['personal_info']['country'] }}</div>
    <ul class="flex gap-[15px] cursor-pointer text-gray-400 text-neutral-50">
        <li class="ease-in duration-200 hover:text-gray-100"><a href="{{ $info['personal_info']['github'] }}"><i class="fa-brands fa-xl fa-github"></i></a></li>
        <li class="ease-in duration-200 hover:text-gray-100"><a href="{{ $info['personal_info']['linkedin'] }}"><i class="fa-brands fa-xl fa-linkedin"></i></a></li>
        <li class="ease-in duration-200 hover:text-gray-100"><a href="{{ $info['personal_info']['instagram'] }}"><i class="fa-brands fa-xl fa-instagram"></i></a></li>
        <li class="ease-in duration-200 hover:text-gray-100"><a href="{{ $info['personal_info']['twitter'] }}"><i class="fa-brands fa-xl fa-twitter"></i></a></li>
    </ul>
</div>
