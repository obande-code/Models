/* globals Chart:false, feather:false */
document.onreadystatechange = function () {
    if (document.readyState === 'complete') {
      let location = (window.location.href).toString();
      console.log(location.search('home'))
      if (location.search('home') > 0) {
          document.getElementById('title').innerHTML="OHAII";
          document.getElementById('home').classList.add("item-active");
      }
      else if (location.search('chats') > 0) {
          document.getElementById('title').innerHTML="CHATS";
          document.getElementById('chats').classList.add("item-active");
      }
      else if (location.search('models') > 0) {
          document.getElementById('title').innerHTML="MODELS";
          document.getElementById('models').classList.add("item-active");
      }
      else if (location.search('livenow') > 0) {
          document.getElementById('title').innerHTML="LIVE NOW";
          document.getElementById('livenow').classList.add("item-active");
      }
      else if (location.search('explore') > 0) {
          document.getElementById('title').innerHTML="EXPLORE";
          document.getElementById('explore').classList.add("item-active");
      }
      else if (location.search('favorites') > 0) {
          document.getElementById('title').innerHTML="FAVORITES";
          document.getElementById('favorites').classList.add("item-active");
      }
      else if (location.search('ablogs') > 0) {
          document.getElementById('title').innerHTML="BLOGS";
          document.getElementById('ablogs').classList.add("item-active");
      }
      else if (location.search('contactus') > 0) {
          document.getElementById('contactus').classList.add("item-active");
      }
      else if (location.search('afaqs') > 0) {
          document.getElementById('title').innerHTML="FAQS";
          document.getElementById('faqs').classList.add("item-active");
      }
      else if (location.search('dashboard') > 0) {
          document.getElementById('title').innerHTML="DASHBOARD";
          document.getElementById('dashboard').classList.add("item-active");
      }
      else if (location.search('analytics') > 0) {
          document.getElementById('title').innerHTML="ANALYTICS";
          document.getElementById('analytics').classList.add("item-active");
      }
      else if (location.search('managepost') > 0) {
          document.getElementById('title').innerHTML="MANAGEPOSTS";
          document.getElementById('managepost').classList.add("item-active");
      }
      else if (location.search('modelmanagement') > 0) {
          document.getElementById('title').innerHTML="MODELMANAGEMENT";
          document.getElementById('modelmanagement').classList.add("item-active");
      }
      else if (location.search('bannermanagement') > 0) {
        document.getElementById('title').innerHTML="BANNERMANAGEMENT";
        document.getElementById('bannermanagement').classList.add("item-active");
      }
      else if (location.search('advertisemanagement') > 0) {
        document.getElementById('advertisemanagement').classList.add("item-active");
      }
      else if (location.search('blogsmanagement') > 0) {
        document.getElementById('title').innerHTML="BLOGSMANAGEMENT";
        document.getElementById('blogsmanagement').classList.add("item-active");
      }
      else if (location.search('faqsmanagement') > 0) {
        document.getElementById('title').innerHTML="FAQSMANAGEMENT";
        document.getElementById('faqsmanagement').classList.add("item-active");
      }
      else if (location.search('premium') > 0) {
        document.getElementById('title').innerHTML="PREMIUMVIDEO";
        document.getElementById('premiumvideo').classList.add("item-active");
        let videos = document.getElementsByTagName('video');
        for (let index = 0; index < videos.length; index++) {
            const element = videos[index];
            if (element.duration) {
                let m1 = parseInt(element.duration/600);
                let m2 = parseInt(element.duration/60);
                let s1 = parseInt(element.duration%60/10);
                let s2 = parseInt(element.duration%60%10);
                document.getElementById(element.id+'time').innerHTML  = m1.toString()+m2.toString()+':'+s1.toString()+s2.toString();
            }
            else {
                let m1 = Math.floor(Math.random() * 5);
                let m2 = Math.floor(Math.random() * 10);
                let s1 = Math.floor(Math.random() * 5);
                let s2 = Math.floor(Math.random() * 10);document.getElementById(element.id+'time').innerHTML  = m1.toString()+m2.toString()+':'+s1.toString()+s2.toString();
            }
        }
      }
    }
  }