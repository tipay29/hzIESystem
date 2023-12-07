<!-- Modal -->
<div class="modal fade" id="dataReportModal" tabindex="-1" aria-labelledby="dataReportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataReportModalLabel">Data Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{route('export.cuts')}}" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="dr_date_one">1st Date
                        @error('dr_date_one') <small class="text-danger">{{$message}}</small>  @enderror
                    </label>
                    <input id="dr_date_one" name='dr_date_one' type="datetime-local"
                           class="form-control" required>

                </div>
                <div class="form-group">
                    <label for="dr_date_two">2nd Date
                        @error('dr_date_two') <small class="text-danger">{{$message}}</small>  @enderror
                    </label>
                    <input id="dr_date_two" name='dr_date_two' type="datetime-local"
                           class="form-control" required>

                </div>

            </div>
            <div class="modal-footer">
                @csrf
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
            </form>
        </div>
    </div>
</div>
