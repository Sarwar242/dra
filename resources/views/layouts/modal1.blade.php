<div class="modal" id="modal1" tabindex="-1" data-backdrop="false" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Generate Result</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form method="post" action="{{ route('result.generate') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group col-sm-6 offset-sm-3">
                    <label for="day">Exam</label>
                    <select class="form-control selectpicker" name="exam_id" id="exam_id" required>
                        <option value="" disabled selected>Select One</option>
                        @foreach (App\Models\Exam::all() as $exam)
                            <option value="{{ $exam->id }}">{{ $exam->name }}-{{ $exam->year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6 offset-sm-3">
                    <label for="batch">Department-Batch</label>
                    <select class="form-control selectpicker" name="batch_id" id="batch" required>
                        <option value="" disabled selected>Select One</option>
                        @foreach (App\Models\Batch::all() as $batch)
                            <option value="{{ $batch->id }}">{{ $batch->department->name }}--{{ $batch->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="modal-footer">
            <button type="submit" id="submit" class="btn btn-primary">Start</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
