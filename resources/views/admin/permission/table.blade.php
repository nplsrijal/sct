<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Modules Name</th>
											@foreach($usertype as $li)
                                            <th>{{$li->typename}}</th>

                                            @endforeach
												
											</tr>
										</thead>
										<tbody>
                                        @foreach($menu as $m)
                                            <tr>
                                                <td>{{$m->modulename}}</td>
                                                @foreach($usertype as $li)
                                                <td>
                                                    @php 
                                                     if(isset($allowed[$m->id.'_'.$li->id]))
                                                      $check='checked';
                                                     else
                                                      $check='';
                                                    @endphp
                                                    <div class="form-check form-switch">
										            <input class="form-check-input permission_chk" value="{{$m->id.'_'.$li->id}}" type="checkbox" id="flexSwitchCheckDefault" {{$check}}>
                                                    </div>
                                                </td>

                                                @endforeach

                                            </tr>

                                            @endforeach
											
										</tbody>
									</table>