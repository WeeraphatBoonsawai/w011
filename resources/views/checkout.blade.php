<x-app-layout>
    <main class="my-8">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-blue-400 rounded">
                            <p class="text-white">{{ $message }}</p>
                        </div>
                    @endif
                    <h3 class="text-3xl font-bold">Carts</h3>
                    <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                            <thead>
                                <tr class="h-12 uppercase">
                                    <th class="hidden md:table-cell"></th>
                                    <th class="text-left">Name</th>
                                    <th class="pl-5 text-left lg:text-right lg:pl-0">
                                        <span class="lg:hidden" title="Quantity">Qtd</span>
                                        <span class="hidden lg:inline">Quantity</span>
                                    </th>
                                    <th class="hidden text-right md:table-cell"> price</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td class="hidden pb-4 md:table-cell" style="width:230px;">
                                            <a href="#">
                                                <img src="{{ $item->attributes->image }}" class="w-[200px] rounded" alt="Thumbnail">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <p class="mb-2 text-gray-900 font-bold">{{ $item->name }}</p>
                                            </a>
                                        </td>

                                        <td class="hidden text-right md:table-cell">
                                            <span class="text-sm font-medium lg:text-base">
                                                ${{ $item->quantity }}
                                            </span>
                                        </td>


                                        <td class="hidden text-right md:table-cell">
                                            <span class="text-sm font-medium lg:text-base">
                                                ${{ $item->price }}
                                            </span>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-between items-center my-5">
                            <div class="font-semibold text-2xl">Total: ${{ Cart::getTotal() }}</div>
                            <div>

                                

                                <form action="{{ route('cart.save') }}" method="POST">
                                    @csrf
                                    <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-gray-800">Clear Carts</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>