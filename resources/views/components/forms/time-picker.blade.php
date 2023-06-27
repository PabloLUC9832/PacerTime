<div class="mt-2 col-span-6 md:grid grid-cols-6 gap-4 md:items-center">

    <div class="block md:col-start-1 col-end-3">
        <label for="hora{{$name}}" class="label-input">{{$message}}</label>
        @if($required)
            <span class="text-xs italic text-primary-red font-semibold	">
                Obligatorio
             </span>
        @endif
    </div>


    <div class="block mt-3 md:col-start-3 col-end-6">

        <select name="hora{{$name}}" id="hora{{$name}}" class="text-white px-2 outline-none appearance-none bg-primary rounded-md" {{$required}}>

            <option value="--" {{$valueHora == '--' ? 'selected' : '' }}>01</option>
            <option value="01" {{$valueHora == '01' ? 'selected' : '' }}>01</option>
            <option value="02" {{$valueHora == '02' ? 'selected' : '' }}>02</option>
            <option value="03" {{$valueHora == '03' ? 'selected' : '' }}>03</option>
            <option value="04" {{$valueHora == '04' ? 'selected' : '' }}>04</option>
            <option value="05" {{$valueHora == '05' ? 'selected' : '' }}>05</option>
            <option value="06" {{$valueHora == '06' ? 'selected' : '' }}>06</option>
            <option value="07" {{$valueHora == '07' ? 'selected' : '' }}>07</option>
            <option value="08" {{$valueHora == '08' ? 'selected' : '' }}>08</option>
            <option value="09" {{$valueHora == '09' ? 'selected' : '' }}>09</option>
            <option value="10" {{$valueHora == '10' ? 'selected' : '' }}>10</option>
            <option value="11" {{$valueHora == '11' ? 'selected' : '' }}>11</option>
            <option value="12" {{$valueHora == '12' ? 'selected' : '' }}>12</option>

        </select>
        <span class="px-2 text-white">:</span>
        <select name="minuto{{$name}}" id="minuto{{$name}}" class="text-white px-2 outline-none appearance-none bg-primary rounded-md" {{$required}}>

            <option value="--" {{$valueMinuto == '--' ? 'selected' : '' }} >--</option>
            <option value="00" {{$valueMinuto == '00' ? 'selected' : '' }} >00</option>
            <option value="01" {{$valueMinuto == '01' ? 'selected' : '' }} >01</option>
            <option value="02" {{$valueMinuto == '02' ? 'selected' : '' }} >02</option>
            <option value="03" {{$valueMinuto == '03' ? 'selected' : '' }} >03</option>
            <option value="04" {{$valueMinuto == '04' ? 'selected' : '' }} >04</option>
            <option value="05" {{$valueMinuto == '05' ? 'selected' : '' }} >05</option>
            <option value="06" {{$valueMinuto == '06' ? 'selected' : '' }} >06</option>
            <option value="07" {{$valueMinuto == '07' ? 'selected' : '' }} >07</option>
            <option value="08" {{$valueMinuto == '08' ? 'selected' : '' }} >08</option>
            <option value="09" {{$valueMinuto == '09' ? 'selected' : '' }} >09</option>
            <option value="10" {{$valueMinuto == '10' ? 'selected' : '' }} >10</option>
            <option value="11" {{$valueMinuto == '11' ? 'selected' : '' }} >11</option>
            <option value="12" {{$valueMinuto == '12' ? 'selected' : '' }} >12</option>
            <option value="13" {{$valueMinuto == '13' ? 'selected' : '' }} >13</option>
            <option value="14" {{$valueMinuto == '14' ? 'selected' : '' }} >14</option>
            <option value="15" {{$valueMinuto == '15' ? 'selected' : '' }} >15</option>
            <option value="16" {{$valueMinuto == '16' ? 'selected' : '' }} >16</option>
            <option value="17" {{$valueMinuto == '17' ? 'selected' : '' }} >17</option>
            <option value="18" {{$valueMinuto == '18' ? 'selected' : '' }} >18</option>
            <option value="19" {{$valueMinuto == '19' ? 'selected' : '' }} >19</option>
            <option value="20" {{$valueMinuto == '20' ? 'selected' : '' }} >20</option>
            <option value="21" {{$valueMinuto == '21' ? 'selected' : '' }} >21</option>
            <option value="22" {{$valueMinuto == '22' ? 'selected' : '' }} >22</option>
            <option value="23" {{$valueMinuto == '23' ? 'selected' : '' }} >23</option>
            <option value="24" {{$valueMinuto == '24' ? 'selected' : '' }} >24</option>
            <option value="25" {{$valueMinuto == '25' ? 'selected' : '' }} >25</option>
            <option value="26" {{$valueMinuto == '26' ? 'selected' : '' }} >26</option>
            <option value="27" {{$valueMinuto == '27' ? 'selected' : '' }} >27</option>
            <option value="28" {{$valueMinuto == '28' ? 'selected' : '' }} >28</option>
            <option value="29" {{$valueMinuto == '29' ? 'selected' : '' }} >29</option>
            <option value="30" {{$valueMinuto == '30' ? 'selected' : '' }} >30</option>
            <option value="31" {{$valueMinuto == '31' ? 'selected' : '' }} >31</option>
            <option value="32" {{$valueMinuto == '32' ? 'selected' : '' }} >32</option>
            <option value="33" {{$valueMinuto == '33' ? 'selected' : '' }} >33</option>
            <option value="34" {{$valueMinuto == '34' ? 'selected' : '' }} >34</option>
            <option value="35" {{$valueMinuto == '35' ? 'selected' : '' }} >35</option>
            <option value="36" {{$valueMinuto == '36' ? 'selected' : '' }} >36</option>
            <option value="37" {{$valueMinuto == '37' ? 'selected' : '' }} >37</option>
            <option value="38" {{$valueMinuto == '38' ? 'selected' : '' }} >38</option>
            <option value="39" {{$valueMinuto == '39' ? 'selected' : '' }} >39</option>
            <option value="40" {{$valueMinuto == '40' ? 'selected' : '' }} >40</option>
            <option value="41" {{$valueMinuto == '41' ? 'selected' : '' }} >41</option>
            <option value="42" {{$valueMinuto == '42' ? 'selected' : '' }} >42</option>
            <option value="43" {{$valueMinuto == '43' ? 'selected' : '' }} >43</option>
            <option value="44" {{$valueMinuto == '44' ? 'selected' : '' }} >44</option>
            <option value="45" {{$valueMinuto == '45' ? 'selected' : '' }} >45</option>
            <option value="46" {{$valueMinuto == '46' ? 'selected' : '' }} >46</option>
            <option value="47" {{$valueMinuto == '47' ? 'selected' : '' }} >47</option>
            <option value="48" {{$valueMinuto == '48' ? 'selected' : '' }} >48</option>
            <option value="49" {{$valueMinuto == '49' ? 'selected' : '' }} >49</option>
            <option value="50" {{$valueMinuto == '50' ? 'selected' : '' }} >50</option>
            <option value="51" {{$valueMinuto == '51' ? 'selected' : '' }} >51</option>
            <option value="52" {{$valueMinuto == '52' ? 'selected' : '' }} >52</option>
            <option value="53" {{$valueMinuto == '53' ? 'selected' : '' }} >53</option>
            <option value="54" {{$valueMinuto == '54' ? 'selected' : '' }} >54</option>
            <option value="55" {{$valueMinuto == '55' ? 'selected' : '' }} >55</option>
            <option value="56" {{$valueMinuto == '56' ? 'selected' : '' }} >56</option>
            <option value="57" {{$valueMinuto == '57' ? 'selected' : '' }} >57</option>
            <option value="58" {{$valueMinuto == '58' ? 'selected' : '' }} >58</option>
            <option value="59" {{$valueMinuto == '59' ? 'selected' : '' }} >59</option>

        </select>

        <select name="periodo{{$name}}" id="periodo{{$name}}" class="text-white px-2 outline-none appearance-none bg-primary rounded-md" {{$required}}>
            {{--
            @if($valuePeriodo)
                <option value="{{$valuePeriodo}}">{{$valuePeriodo}}</option>
            @else
                <option value="">--</option>
            @endif
            --}}
            <option value="--" {{$valuePeriodo == '--' ? 'selected' : '' }} >--</option>
            <option value="AM" {{$valuePeriodo == 'AM' ? 'selected' : '' }} >AM</option>
            <option value="PM" {{$valuePeriodo == 'PM' ? 'selected' : '' }} >PM</option>

        </select>

    </div>


</div>
