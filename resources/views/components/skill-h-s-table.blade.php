<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gold-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gold-200">
                    <thead class="bg-gold-900 bg-opacity-50 p-6 border-gold-600 border-t-4 rounded-sm shadow">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Rank
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Username
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Total Level
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                            Total XP
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">View</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-gold-600 bg-opacity-75 divide-y divide-gold-200">
                    @foreach($skill as $player)
                        <tr class="hover:bg-gold-700">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-md font-medium text-gold-900">
                                    {{number_format($loop->index + 1)}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium">
                                    {{$player['player_name']}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{number_format($player['player_level'])}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{number_format($player['player_exp'])}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('highscores-individual', ['player_id' => $player['player_id']])}}" class="text-white hover:text-gold-900">
                                    View Player
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
