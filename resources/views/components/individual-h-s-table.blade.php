<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gold-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gold-200">
                    <thead class="bg-gold-900 bg-opacity-50 p-6 border-gold-600 border-t-4 rounded-sm shadow">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Skill
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Rank
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Level
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Experience
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-gold-600 bg-opacity-75 divide-y divide-gold-200">
                    @foreach($skills as $skill)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gold-900">
                                    <img class="inline-block" src="{{asset('img/skills/'.$skill['icon'])}}" alt="{{$skill['name']}}" />
                                    <h1 class="inline-block">{{$skill['name']}}</h1>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium">
                                    {{number_format($skill['rank'])}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$skill['level']}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{number_format($skill['xp'])}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

