<div class="paragraph__content-container">
    <div class="paragraph__timeline">
        <div class="paragraph__timeline__container">

            @foreach ($data as $detail)
                <?php $status = $detail->status?>

                    <div id="style{{$detail->id}}"class="paragraph__timeline__entry --entry-1 <?php echo ($status == 0) ? "--is-pending" : "--is-completed"?>">
                        <span></span>
                        <div class="paragraph__timeline__content-container">
                            <div class="paragraph__timeline__content">
                                <div class="paragraph__timeline__title">{{ $detail->content }}</div>
                                <div class="paragraph__timeline__info">
                                    @if (substr($detail->addition,0,4) == 'http')
                                        <a href="{{$detail->addition}}" style="font-style: italic;">Addition</a>
                                    @else
                                        <div> {{$detail->addition}} </div>
                                    @endif
                                </div>
                                <div class="paragraph__timeline__date-time">
                                    <span class="paragraph__timeline__date">{{ date('d/m/Y', strtotime($detail->date)) }}</span>
                                </div>
                            <div>
                                <div class="paragraph__timeline__name d-flex" style="align-items: center; justify-content:space-between;">
                                    <div>
                                        <a href="javascript:void(0)" onclick="if (confirm('Bạn có chắc muốn xóa không?')) document.getElementById('delete-{{ $detail->id }}').submit()">
                                            <i class="far fa-trash-alt sidebar-icon" style="font-size: 20px;"></i>
                                        </a>
                                        <form method="POST" id="delete-{{ $detail->id }}" action="{{ url("/delete/detail_process/{$detail->id}") }}" >
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </div>
                                    <div>
                                            <input type="hidden" class="status" id="{{ $detail->id }}" value="<?php echo ($status == 0) ? "1" : "0"?>">
                                            <button id="btn{{$detail->id}}" onclick="updateStatus({{ $detail->id }})" class="btn <?php echo ($status == 0) ? "btn-success" : "btn-danger"?>  "  style="font-size: 15px;">
                                                <?php echo ($status == 0) ? "Complete" : "Cancel"?>
                                            </button>

                                    </div>
                                </div>

                            </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            </div>
        </div>
    </div>
