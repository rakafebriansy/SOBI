package com.example.sobi;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Find the WebView by its unique ID
        WebView webView = (WebView) findViewById(R.id.webview);

        //WebSettings webSettings = webView.getSettings();
        //webSettings.setJavaScriptEnabled(true);
        webView.setWebViewClient(new WebViewClient());
        webView .getSettings().setJavaScriptEnabled(true);
        webView .getSettings().setDomStorageEnabled(true);
        webView.loadUrl("https://sobatdisabilitas.000webhostapp.com/");

    }
}