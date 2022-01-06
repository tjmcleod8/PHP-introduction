$(document).ready(function(){
    $("#Computer").hide();
    $("#Owner").hide();
    $("#Room").hide();
    $("#AssetType").hide();
    $("#Allo").hide();
    $("#MakeForm").hide();
    $("#ModelForm").hide();
    $("#Year").hide();
    $("#Replacement").hide();
    $("#ReplacementYear").hide();
    $("#Amount").hide();
});


function querySelection(){ 
    selection = document.getElementById("selection").value;

    if(selection == "Serial Number"){
        $("#Serial").show();
        $("#Computer").hide();
        $("#Owner").hide();
        $("#Room").hide();
        $("#AssetType").hide();
        $("#Allo").hide();
        $("#MakeForm").hide();
        $("#ModelForm").hide();
        $("#Year").hide();
        $("#Replacement").hide();
        $("#ReplacementYear").hide();
        $("#Amount").hide();

    }else if(selection == "Computer Name"){
        $("#Serial").hide();
        $("#Computer").show();
        $("#Owner").hide();
        $("#Room").hide();
        $("#AssetType").hide();
        $("#Allo").hide();
        $("#MakeForm").hide();
        $("#ModelForm").hide();
        $("#Year").hide();
        $("#Replacement").hide();
        $("#ReplacementYear").hide();
        $("#Amount").hide();

    }else if(selection == "Owner"){
        $("#Serial").hide();
        $("#Computer").hide();
        $("#Owner").show();
        $("#Room").hide();
        $("#AssetType").hide();
        $("#Allo").hide();
        $("#MakeForm").hide();
        $("#ModelForm").hide();
        $("#Year").hide();
        $("#Replacement").hide();
        $("#ReplacementYear").hide();
        $("#Amount").hide();

    }else if(selection == "Room"){
        $("#Serial").hide();
        $("#Computer").hide();
        $("#Owner").hide();
        $("#Room").show();
        $("#AssetType").hide();
        $("#Allo").hide();
        $("#MakeForm").hide();
        $("#ModelForm").hide();
        $("#Year").hide();
        $("#Replacement").hide();
        $("#ReplacementYear").hide();
        $("#Amount").hide();

    }else if(selection == "Asset Type"){
        $("#Serial").hide();
        $("#Computer").hide();
        $("#Owner").hide();
        $("#Room").hide();
        $("#AssetType").show();
        $("#Allo").hide();
        $("#MakeForm").hide();
        $("#ModelForm").hide();
        $("#Year").hide();
        $("#Replacement").hide();
        $("#ReplacementYear").hide();
        $("#Amount").hide();

    }else if(selection == "Allocation"){
        $("#Serial").hide();
        $("#Computer").hide();
        $("#Owner").hide();
        $("#Room").hide();
        $("#AssetType").hide();
        $("#Allo").show();
        $("#MakeForm").hide();
        $("#ModelForm").hide();
        $("#Year").hide();
        $("#Replacement").hide();
        $("#ReplacementYear").hide();
        $("#Amount").hide();

    }else if(selection == "Make"){
        $("#Serial").hide();
        $("#Computer").hide();
        $("#Owner").hide();
        $("#Room").hide();
        $("#AssetType").hide();
        $("#Allo").hide();
        $("#MakeForm").show();
        $("#ModelForm").hide();
        $("#Year").hide();
        $("#Replacement").hide();
        $("#ReplacementYear").hide();
        $("#Amount").hide();

    }else if(selection == "Model"){
        $("#Serial").hide();
        $("#Computer").hide();
        $("#Owner").hide();
        $("#Room").hide();
        $("#AssetType").hide();
        $("#Allo").hide();
        $("#MakeForm").hide();
        $("#ModelForm").show();
        $("#Year").hide();
        $("#Replacement").hide();
        $("#ReplacementYear").hide();
        $("#Amount").hide();
        
    }else if(selection == "Year Purchased"){
        $("#Serial").hide();
        $("#Computer").hide();
        $("#Owner").hide();
        $("#Room").hide();
        $("#AssetType").hide();
        $("#Allo").hide();
        $("#MakeForm").hide();
        $("#ModelForm").hide();
        $("#Year").show();
        $("#Replacement").hide();
        $("#ReplacementYear").hide();
        $("#Amount").hide();

    }else if(selection == "Replacement"){
        $("#Serial").hide();
        $("#Computer").hide();
        $("#Owner").hide();
        $("#Room").hide();
        $("#AssetType").hide();
        $("#Allo").hide();
        $("#MakeForm").hide();
        $("#ModelForm").hide();
        $("#Year").hide();
        $("#Replacement").show();
        $("#ReplacementYear").hide();
        $("#Amount").hide();
        
    }else if(selection == "Replacement Year"){
        $("#Serial").hide();
        $("#Computer").hide();
        $("#Owner").hide();
        $("#Room").hide();
        $("#AssetType").hide();
        $("#Allo").hide();
        $("#MakeForm").hide();
        $("#ModelForm").hide();
        $("#Year").hide();
        $("#Replacement").hide();
        $("#ReplacementYear").show();
        $("#Amount").hide();
        
    }else if(selection == "Cost"){
        $("#Serial").hide();
        $("#Computer").hide();
        $("#Owner").hide();
        $("#Room").hide();
        $("#AssetType").hide();
        $("#Allo").hide();
        $("#MakeForm").hide();
        $("#ModelForm").hide();
        $("#Year").hide();
        $("#Replacement").hide();
        $("#ReplacementYear").hide();
        $("#Amount").show();
        
    }
}