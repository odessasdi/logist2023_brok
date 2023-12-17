<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="flex items-center justify-center" aria-label="Progress">

  <ol role="list" class=" flex items-center space-x-4 pt-1">

  

  @IF($slot == '1')
    
    
  
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>



  @ELSEIF($slot == '2')
  

    <li>
      <!-- Current Step -->
      <p class="relative flex items-center justify-center" aria-current="step">
        <span class="absolute w-4 h-4 p-px flex" aria-hidden="true">
          <span class="w-full h-full rounded-full bg-red-200"></span>
        </span>
        <span class="relative block w-2 h-2 bg-red-600 rounded-full" aria-hidden="true"></span>
      </p>
    </li>

    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>

  @ELSEIF($slot == '3')


   <li><p  class="block w-2 h-2 bg-red-400 rounded-full"></p></li>

    <li>
      <!-- Current Step -->
      <p class="relative flex items-center justify-center" aria-current="step">
        <span class="absolute w-4 h-4 p-px flex" aria-hidden="true">
          <span class="w-full h-full rounded-full bg-yellow-200"></span>
        </span>
        <span class="relative block w-2 h-2 bg-yellow-600 rounded-full" aria-hidden="true"></span>
      </p>
    </li>

    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>

    @ELSEIF($slot == '4')


   <li><p  class="block w-2 h-2 bg-red-400 rounded-full"></p></li>
   <li><p  class="block w-2 h-2 bg-yellow-400 rounded-full"></p></li>
   

    <li>
      <!-- Current Step -->
      <p class="relative flex items-center justify-center" aria-current="step">
        <span class="absolute w-4 h-4 p-px flex" aria-hidden="true">
          <span class="w-full h-full rounded-full bg-indigo-200"></span>
        </span>
        <span class="relative block w-2 h-2 bg-purple-600 rounded-full" aria-hidden="true"></span>
      </p>
    </li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>
    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>


   
    @ELSEIF($slot == '5')


   <li><p  class="block w-2 h-2 bg-red-400 rounded-full"></p></li>
   <li><p  class="block w-2 h-2 bg-yellow-400 rounded-full"></p></li>
   <li><p  class="block w-2 h-2 bg-purple-400 rounded-full"></p></li>
   

    <li>
      <!-- Current Step -->
      <p class="relative flex items-center justify-center" aria-current="step">
        <span class="absolute w-4 h-4 p-px flex" aria-hidden="true">
          <span class="w-full h-full rounded-full bg-blue-200"></span>
        </span>
        <span class="relative block w-2 h-2 bg-blue-600 rounded-full" aria-hidden="true"></span>
      </p>
    </li>

    <li><p class="block w-2 h-2 bg-gray-200 rounded-full"></p></li>


    @ELSEIF($slot == '6')


   <li><p  class="block w-2 h-2 bg-red-400 rounded-full"></p></li>
   <li><p  class="block w-2 h-2 bg-yellow-400 rounded-full"></p></li>
   <li><p  class="block w-2 h-2 bg-purple-400 rounded-full"></p></li>
   <li><p  class="block w-2 h-2 bg-blue-400 rounded-full"></p></li>

    <li>
      <!-- Current Step -->
      <p class="relative flex items-center justify-center" aria-current="step">
        <span class="absolute w-4 h-4 p-px flex" aria-hidden="true">
          <span class="w-full h-full rounded-full bg-green-200"></span>
        </span>
        <span class="relative block w-2 h-2 bg-green-600 rounded-full" aria-hidden="true"></span>
      </p>
    </li>


  @ENDIF
  </ol>
</nav>