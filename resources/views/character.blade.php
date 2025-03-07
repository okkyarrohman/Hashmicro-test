@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">🔍 Character Match Checker</h2>

        <div class="card shadow-sm p-4 mt-4">
            <form id="matchForm">
                @csrf
                <div class="mb-3">
                    <label for="input1" class="form-label">Input 1</label>
                    <input type="text" id="input1" name="input1" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="input2" class="form-label">Input 2</label>
                    <input type="text" id="input2" name="input2" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Cek Persentase</button>
            </form>

            <div class="mt-4" id="result" style="display: none;">
                <h4>📊 Hasil:</h4>
                <p><strong>Persentase:</strong> <span id="percentage"></span>%</p>
                <p><strong>Karakter Cocok:</strong> <span id="matched"></span> dari <span id="total"></span></p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('matchForm').addEventListener('submit', function (event) {
            event.preventDefault();

            let formData = new FormData(this);

            fetch("{{ url('/character') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                }
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('result').style.display = "block";
                    document.getElementById('percentage').innerText = data.percentage;
                    document.getElementById('matched').innerText = data.matched;
                    document.getElementById('total').innerText = data.total;
                })
                .catch(error => console.error("Error:", error));
        });
    </script>
@endsection