<div class="flex mt-auto items-center justify-evenly sm:justify-between flex-col sm:flex-row sm:px-[30px] md:px-[40px] lg:px-[50px] xl:px-[75px] w-full h-[80px] bg-gray-900 h-14 bg-gradient-to-r from-purple-500 to-pink-500" id="footer">
    <a class="text-neutral-50 font-semibold" href="mailto:{{ $info['email'] }}">{{ $info['email'] }}</a>
    <div class="text-neutral-50 font-semibold">{{ $info['full_name'] }} / {{ $info['country'] }}</div>
    <ul class="flex gap-[15px] cursor-pointer text-gray-400 text-neutral-50">
        <li class="ease-in duration-200 hover:text-gray-100"><a href="{{ $info['github'] }}"><i class="fa-brands fa-xl fa-github"></i></a></li>
        <li class="ease-in duration-200 hover:text-gray-100"><a href="{{ $info['linkedin'] }}"><i class="fa-brands fa-xl fa-linkedin"></i></a></li>
        <li class="ease-in duration-200 hover:text-gray-100"><a href="{{ $info['instagram'] }}"><i class="fa-brands fa-xl fa-instagram"></i></a></li>
        <li class="ease-in duration-200 hover:text-gray-100"><a href="{{ $info['twitter'] }}"><i class="fa-brands fa-xl fa-twitter"></i></a></li>
    </ul>
</div>
