<span class="inline-flex items-center px-2 py-0 rounded text-xs font-medium bg-{{ $container->positionColor }}-100 text-{{ $container->positionColor }}-800">
    {{ $container->positionName }}

    <span 
        class="font-bold  ml-2 mr-2 text-white rounded-full bg-{{ $container->positionColor }}-500  pl-1 pr-1"
    >
    @IF($container->position < 6)
    {{ $container->position_diff_date < 0 ?  $container->positionSlug.$container->position_date : $container->position_diff_date  }}
    @ELSEIF($container->position = 6)
    {{ $container->position_diff_date < 0 ?  $container->positionSlug.$container->position_date : $container->position_date }}
    @ENDIF
    </span>

    @IF($container->position_diff_date > 0 and $container->position < 6)
    <i class="fas fa-calendar-alt mr-2"></i>
    @ENDIF

</span>









<!-- todo  не генерирует стили -->
<span class="inline-flex items-center px-2 py-0 rounded text-xs font-medium bg-gray-100 text-gray-800" style="display: none;">
    <span class="font-bold  ml-2 mr-2 text-white rounded-full bg-gray-500  pl-1 pr-1">   
    </span>
        <i class="fas fa-calendar-alt mr-2"></i>
</span>



<span class="inline-flex items-center px-2 py-0 rounded text-xs font-medium bg-red-100 text-red-800" style="display: none;">
    <span class="font-bold  ml-2 mr-2 text-white rounded-full bg-red-500  pl-1 pr-1">   
    </span>
        <i class="fas fa-calendar-alt mr-2"></i>
</span>              

<span class="inline-flex items-center px-2 py-0 rounded text-xs font-medium bg-yellow-100 text-yellow-800" style="display: none;">
    <span class="font-bold  ml-2 mr-2 text-white rounded-full bg-yellow-500  pl-1 pr-1">   
    </span>
        <i class="fas fa-calendar-alt mr-2"></i>
</span>              


<span class="inline-flex items-center px-2 py-0 rounded text-xs font-medium bg-purple-100 text-purple-800" style="display: none;">
    <span class="font-bold  ml-2 mr-2 text-white rounded-full bg-purple-500  pl-1 pr-1">   
    </span>
        <i class="fas fa-calendar-alt mr-2"></i>
</span>              


<span class="inline-flex items-center px-2 py-0 rounded text-xs font-medium bg-blue-100 text-blue-800" style="display: none;">
    <span class="font-bold  ml-2 mr-2 text-white rounded-full bg-blue-500  pl-1 pr-1">   
    </span>
        <i class="fas fa-calendar-alt mr-2"></i>
</span>              


<span class="inline-flex items-center px-2 py-0 rounded text-xs font-medium bg-green-100 text-green-800" style="display: none;">
    <span class="font-bold  ml-2 mr-2 text-white rounded-full bg-green-500  pl-1 pr-1">   
    </span>
        <i class="fas fa-calendar-alt mr-2"></i>
</span>              

