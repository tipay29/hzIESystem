
<!-- Modal HTML -->
<div id="emailCtnOrderModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5> Email </h5>
                <button id="btn-close-fabric-code-modal" type="button" data-bs-dismiss="modal"
                        class="btn-close" aria-label="Close"></button>
            </div>

            <form action="{{route('carton-orders.sendMail')}}" method="post" enctype="multipart/form-data">

                <div class="modal-body">

                        @csrf
                        <div class="form-group">
                            <label for="ctn_mail_subject">Subject</label>
                            <input name="ctn_mail_subject" type="text" class="form-control"
                                   id="ctn_mail_subject" aria-describedby="ctn_mail_subject"
                                   value="纸箱采购">
                        </div>

                        <div class="form-group">
                            <label for="ctn_mail_content">Content</label>
                            <textarea  name="ctn_mail_content" class="form-control" id="ctn_mail_content" cols="20" rows="5">
                                Dear DX:
                                    请查收附件:“纸箱采购”并签回
                                    请以此邮件为准进行生产，谢谢!
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="ctn_mail_subject">Attach Excel and PDF here</label>
                            <input type="file" class="form-control" id="ctn_mail_files" name="ctn_mail_files[]" multiple>
                        </div>

                    <input name="ctn_mail_email" type="hidden" value="{{$carton_order->supplier->email}}">
{{--                    value="{{$carton_order->supplier->email}}"--}}
                </div>

                <div class="modal-body">
                    <button id="btn_ctn_send_mail"  class="btn btn-primary form-control">Send</button>
                </div>
            </form>

        </div>
    </div>
</div>
