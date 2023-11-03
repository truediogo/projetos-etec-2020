package com.etec.imc;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class getDataActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_get_data);

        final EditText weight = findViewById(R.id.weight);
        final EditText height = findViewById(R.id.height);

        Button calc = findViewById(R.id.calc);
        calc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(validation(weight, height)) {
                    double weightParse = Double.parseDouble(weight.getText().toString());
                    double heightParse = Double.parseDouble(height.getText().toString());
                    double imc = weightParse / (Math.pow(heightParse, 2));

                    Intent imcResults = new Intent(getDataActivity.this, imcResultsActivity.class);
                    startActivity(imcResults.putExtra("IMC", imc));
                    overridePendingTransition(android.R.anim.fade_in, android.R.anim.fade_out);
                }
            }
        });

        Button backHome = findViewById(R.id.backGetData);
        backHome.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                getDataActivity.this.finish();
                overridePendingTransition(android.R.anim.fade_in, android.R.anim.fade_out);
            }
        });
    }

    private boolean validation(EditText weight, EditText height) {

        if (weight.getText().toString().isEmpty() || weight.getText().toString().equals("0")) {
            Toast.makeText(getDataActivity.this, R.string.emptyWeight, Toast.LENGTH_SHORT).show();
            return false;
        }
        if (height.getText().toString().isEmpty() || height.getText().toString().equals("0")) {
            Toast.makeText(getDataActivity.this, R.string.emptyHeight, Toast.LENGTH_SHORT).show();
            return false;
        }
        return true;
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        overridePendingTransition(android.R.anim.fade_in, android.R.anim.fade_out);
    }
}