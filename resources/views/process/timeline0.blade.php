<table  class="table table-bordered table-hover">
                          <thead>
                            <td>Content</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td></td>
                          </thead>
                        @csrf
                        @foreach ($data as $detail)
                            <tr>
                              <td style="width: 60%">{{ $detail->content }}</td>
                              <td style="width: 20%, text-align:center">{{ date('d/m/Y', strtotime($detail->date)) }}</td>
                              <td style="width: 10%">
                                @switch($detail->status)
                                  @case(0)
                                    Pending
                                    @break
                                  @case(1)
                                      In Progress
                                      @break
                                  @default
                                    Completed
                                @endswitch
                              </td>
                              <td style="width: 2%">
                                  <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('delete-{{ $detail->id }}').submit()">
                                    <i class="fas fa-trash-alt"></i>
                                  </a>
                                <form method="POST" id="delete-{{ $detail->id }}" action="{{ url("/detail_process/{$detail->id}") }}" >
                                  @method('DELETE')
                                  @csrf
                                </form>         
                              </td>
                            </tr>
                            
                        @endforeach
                        </table>