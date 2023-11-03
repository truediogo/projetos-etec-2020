package com.etec.imc;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class imcResultsActivity extends AppCompatActivity {

    @SuppressLint("Range")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_imc_results);

        Bundle extras = getIntent().getExtras();

        if (extras != null) {
            double imc = extras.getDouble("IMC");

            if (imc != 0) {
                @SuppressLint("DefaultLocale") String imcText = String.format("%.2f", imc);
                TextView imcResult = findViewById(R.id.imcResult);
                imcResult.setText(imcText);

                String imcColor = "";
                String imcInfo = "Resultado";

                if (imc < 18.5) {
                    imcColor = "#88afc8";
                    imcInfo = "Você está abaixo do peso, adote novos hábitos e procure um médico!";
                }

                if (imc >= 18.5 & imc <= 24.9) {
                    imcColor = "#70be98";
                    imcInfo = "Você está com o peso normal, continue se alimentando corretamente e mantenha os bons hábitos!";
                }

                if (imc >= 25 && imc <= 29.9) {
                    imcColor = "#fcd423";
                    imcInfo = "Você está com sobrepeso, revise seus hábitos alimentares e procure um médico se necessário!";
                }

                if (imc >= 30 && imc <= 34.9) {
                    imcColor = "#ed9754";
                    imcInfo = "Você está com obesidade, revise seus hábitos alimentares e procure um médico!";
                }

                if (imc >= 35) {
                    imcColor = "#df4249";
                    imcInfo = "Você está com obesidade severa, procure um médico!";
                }

                imcResult.setTextColor(Color.parseColor(imcColor));

                TextView imcInfoResult = findViewById(R.id.imcInfoResult);
                imcInfoResult.setText(imcInfo);

                Button backGetData = findViewById(R.id.backGetData);
                backGetData.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        imcResultsActivity.this.finish();
                        overridePendingTransition(android.R.anim.fade_in, android.R.anim.fade_out);
                    }
                });
            }
        }
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        overridePendingTransition(android.R.anim.fade_in, android.R.anim.fade_out);
    }
}