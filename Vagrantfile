# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box_url = "http://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box"
    config.vm.box_download_insecure = true
    config.vm.box = "telegramm"
    config.vm.network :forwarded_port, guest: 80, host: 8001
    config.vm.provision :shell, :path => "boxconfig/bootstrap.sh"
    config.vm.synced_folder ".", "/vagrant" , :owner=> 'www-data', :group=>'www-data'
end
